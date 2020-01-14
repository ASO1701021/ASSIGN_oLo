import urllib.request
import urllib.parse
import json
import requests

def lambda_handler(event, context):
    return proofreading(event)


def proofreading(event):
#     API KEYはこちらのURLから取得可能
#     https://a3rt.recruit-tech.co.jp/product/proofreadingAPI/

    API = "https://api.a3rt.recruit-tech.co.jp/proofreading/v2/typo"
    KEY = "APIKEY"

    values = {
        'apikey': KEY,
        'sentence': event['post_sentence'],
        'sensitivity': "medium",
    }
    # パラメータをURLエンコードする
    params = urllib.parse.urlencode(values)
    # リクエスト用のURLを生成
    url = API + "?" + params

    # リクエストを投げて結果を取得
    r = requests.get(url)
    # 辞書型に変換
    data = json.loads(r.text)

    return data
