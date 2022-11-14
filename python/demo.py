#!/user/bin/env python
# -*- coding: utf-8 -*-
# @Project : tradplus_demo
# @Author  : demo
# @File    : demo.py
# @Software: PyCharm
# @Time    : 2022/11/14 14:34:18

import requests

apiKey = 'your apiKey'

url = 'https://openapi.tradplusad.com/v3/allreport'

params = {
    "startDate": "2022-07-01",
    "endDate": "2022-07-07",
    "timezone": "UTC+0",
    "currency": "USD",
    "start": 0,
    "limit": 1000,
    "groupBy":
        [
            "date",
            "appId"
        ],
    "metric":
        [
            "all"
        ]
}

header = {"Authorization": "Bearer {}".format(apiKey)}

response = requests.post(url=url, headers=header, json=params)
print(response.status_code)
print(response.text)
