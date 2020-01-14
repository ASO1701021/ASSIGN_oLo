import json
import requests

def lambda_handler(event, context):
    return cloud_vision(event)


def cloud_vision(event):
    API = 'https://vision.googleapis.com/v1/images:annotate?key=AIzaSyAYdvfJvLlpc9KUTIrqXAHJONupQqZDTv8'
    base64_file = event['image_base64']

    obj = {
        "requests": [
            {
                "image": {
                    "content": base64_file
                },
                "features": [
                    {
                        "type": "TEXT_DETECTION",
                        "maxResults": 1
                    }
                ]
            }
        ]
    }

    json_data = json.dumps(obj).encode("utf-8")
    r = requests.post(API, json_data, headers={'Content-Type': 'application/json'})
    data = json.loads(r.text)

    return data