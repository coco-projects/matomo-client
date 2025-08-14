<?php

    namespace Coco\matomo\fakerProvider;

    class Request extends \Faker\Provider\Base
    {
        protected static $mobileResolutions = [
            '360x640',
            // 常见的低端智能手机
            '375x667',
            // iPhone 6/7/8
            '414x736',
            // iPhone 6/7/8 Plus
            '1080x1920',
            // 1080p 显示的手机
            '1440x2560',
            // 高端智能手机（例如 Galaxy S6）
            '750x1334',
            // iPhone 6/7/8
            '1125x2436',
            // iPhone X
            '828x1792',
            // iPhone XR
            '1242x2688',
            // iPhone XS Max
            '768x1280',
            // 常见的安卓低端设备
            '2160x3840',
            // 高端安卓手机（例如三星 Galaxy S8+）
            '1080x2340',
            // 中端安卓手机
        ];

        protected static $desktopResolutions = [
            '1280x720',
            // HD 显示器
            '1366x768',
            // 低端笔记本分辨率
            '1920x1080',
            // Full HD，最常见的桌面和笔记本分辨率
            '2560x1440',
            // 2K 分辨率，适用于高端显示器
            '3840x2160',
            // 4K 分辨率
            '1920x1200',
            // 16:10 屏幕比例常见分辨率
            '2560x1600',
            // 常见的高端笔记本分辨率
            '3840x2400',
            // 超高分辨率显示器
            '1600x900',
            // 常见的中端笔记本分辨率
            '1680x1050',
            // 较老显示器的分辨率
            '1440x900',
            // 常见的较旧笔记本分辨率
        ];

        protected static $mobileUserAgent = [
            "Mozilla/5.0 (Linux; U; Android 9; zh-cn; Redmi Note 5 Build/PKQ1.180904.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.141 Mobile Safari/537.36 XiaoMi/MiuiBrowser/11.10.8",
            "Mozilla/5.0 (Linux; Android 9; MI 6 Build/PKQ1.190118.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.2.3 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 10; EVR-AL00 Build/HUAWEIEVR-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.186 Mobile Safari/537.36 baiduboxapp/11.0.5.12 (Baidu; P1 10)",
            "Mozilla/5.0 (Linux; Android 9; JKM-AL00b Build/HUAWEIJKM-AL00b; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/8951 MicroMessenger/7.0.12.1620(0x27000C36) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 9; COR-TL10 Build/HUAWEICOR-TL10; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 10; VCE-AL00 Build/HUAWEIVCE-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.186 Mobile Safari/537.36 baiduboxapp/11.0.5.12 (Baidu; P1 10)",
            "Mozilla/5.0 (Linux; Android 10; CLT-AL00 Build/HUAWEICLT-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10) NABar/1.0",
            "Mozilla/5.0 (Linux; Android 10; HMA-AL00 Build/HUAWEIHMA-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/6002 MicroMessenger/7.0.12.1620(0x27000C36) Process/tools NetType/WIFI Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 9; HWI-AL00 Build/HUAWEIHWI-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045129 Mobile Safari/537.36 MMWEBID/6735 MicroMessenger/7.0.12.1620(0x27000C37) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 10; SKW-A0 Build/SKYW2001202CN00MQ0; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10)",
            "Mozilla/5.0 (Linux; Android 8.1.0; PBAM00 Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0) NABar/2.0",
            "Mozilla/5.0 (Linux; Android 9; HWI-AL00 Build/HUAWEIHWI-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045129 Mobile Safari/537.36 MMWEBID/6735 MicroMessenger/7.0.12.1620(0x27000C37) Process/tools NetType/WIFI Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 XWEB/1170 MMWEBSDK/200201 Mobile Safari/537.36 MMWEBID/3371 MicroMessenger/7.0.12.1620(0x27000C36) Process/toolsmp NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 8.1.0; Redmi Note 5 Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0) NABar/2.0",
            "Mozilla/5.0 (Linux; Android 9; ELE-AL00 Build/HUAWEIELE-AL0001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 XWEB/1170 MMWEBSDK/191201 Mobile Safari/537.36 MMWEBID/873 MicroMessenger/7.0.10.1580(0x27000AFE) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 10; HMA-AL00 Build/HUAWEIHMA-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/2679 MicroMessenger/7.0.10.1580(0x27000A59) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 8.1.0; DUB-TL00 Build/HUAWEIDUB-TL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0) NABar/2.0",
            "Mozilla/5.0 (Linux; Android 8.1.0; M1813 Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045129 Mobile Safari/537.36 MMWEBID/1221 MicroMessenger/7.0.12.1620(0x27000C37) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 10; CLT-AL00 Build/HUAWEICLT-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/2644 MicroMessenger/7.0.12.1620(0x27000C36) Process/tools NetType/WIFI Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; U; Android 9; zh-cn; HWI-AL00 Build/HUAWEIHWI-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/10.1 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 9; CLT-AL01 Build/HUAWEICLT-AL01; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 10; VOG-AL00 Build/HUAWEIVOG-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/45016 Mobile Safari/537.36 MMWEBID/3894 MicroMessenger/7.0.12.1620(0x27000C36) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 7.0; Mi-4c Build/NRD91M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 XWEB/1169 MMWEBSDK/191201 Mobile Safari/537.36 MMWEBID/2208 MicroMessenger/7.0.10.1580(0x27010AFF) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (iPhone; CPU iPhone OS 13_0 like Mac OS X) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/13.0 MQQBrowser/10.1.1 Mobile/15B87 Safari/604.1 QBWebViewUA/2 QBWebViewType/1 WKType/1",
            "Mozilla/5.0 (Linux; Android 9; COL-AL10 Build/HUAWEICOL-AL10; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/9048 MicroMessenger/7.0.10.1580(0x27000AFE) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (iPhone; CPU iPhone OS 12_4_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 MicroMessenger/7.0.11(0x17000b21) NetType/4G Language/zh_CN",
            "Mozilla/5.0 (Linux; U; Android 9; zh-cn; Redmi Note 7 Build/PKQ1.180904.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.141 Mobile Safari/537.36 XiaoMi/MiuiBrowser/11.8.14",
            "Mozilla/5.0 (Linux; Android 10; VCE-AL00 Build/HUAWEIVCE-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10) NABar/1.0",
            "Mozilla/5.0 (Linux; Android 9; HLK-AL10 Build/HONORHLK-AL10; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 10; SEA-AL10 Build/HUAWEISEA-AL10; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10) NABar/1.0",
            "Mozilla/5.0 (Linux; U; Android 9; zh-cn; 16s Pro Build/PKQ1.190616.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/9.1 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 9; V1813BT Build/PKQ1.181030.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/63.0.3239.83 Mobile Safari/537.36 T7/11.16 lite baiduboxapp/4.11.0.10 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 7.1.1; OPPO A79k Build/N6F26Q; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/63.0.3239.83 Mobile Safari/537.36 T7/11.15 baiduboxapp/11.15.0.12 (Baidu; P1 7.1.1)",
            "Mozilla/5.0 (Linux; Android 8.1.0; vivo X9s L Build/OPM1.171019.019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; Android 8.0.0; RNE-AL00 Build/HUAWEIRNE-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.0.0)",
            "Mozilla/5.0 (Linux; Android 6.0.1; M2 E Build/MMB29U; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.2.2 (Baidu; P1 6.0.1)",
            "Mozilla/5.0 (Linux; Android 8.1.0; MI PLAY Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; Android 8.1.0; NX606J Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; U; Android 6.0.1; zh-cn; OPPO A57 Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/9.1 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 9; JKM-AL00a Build/HUAWEIJKM-AL00a; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 10; JNY-AL10 Build/HUAWEIJNY-AL10; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10) NABar/2.0",
            "Mozilla/5.0 (Linux; Android 9; vivo X21 Build/PKQ1.180819.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9) NABar/1.0",
            "Mozilla/5.0 (Linux; Android 10; MI 9 Build/QKQ1.190825.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 XWEB/1171 MMWEBSDK/200201 Mobile Safari/537.36 MMWEBID/2568 MicroMessenger/7.0.12.1620(0x27000C37) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/601.3.9 (KHTML, like Gecko) Version/10.0 Mobile/15E148 MicroMessenger/7.0.0(0x27871294) NetType/WIFI Language/zh_CN",
            "Mozilla/5.0 (Linux; Android 10; LYA-AL10 Build/HUAWEILYA-AL10; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/7947 MicroMessenger/7.0.12.1620(0x27000C36) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 9; HLK-AL00 Build/HONORHLK-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/4465 MicroMessenger/7.0.12.1620(0x27000C36) Process/tools NetType/WIFI Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 9; MI 9 SE Build/PKQ1.181121.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045129 Mobile Safari/537.36 MMWEBID/1500 MicroMessenger/7.0.12.1620(0x27000C37) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 10; EVR-AL00 Build/HUAWEIEVR-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/67.0.3396.87 XWEB/1170 MMWEBSDK/200201 Mobile Safari/537.36 MMWEBID/5192 MicroMessenger/7.0.12.1620(0x27000C36) Process/toolsmp NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 10; EVR-AL00 Build/HUAWEIEVR-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10) NABar/1.0",
            "Mozilla/5.0 (Linux; U; Android 9; zh-CN; LON-AL00 Build/HUAWEILON-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.108 UCBrowser/12.9.0.1070 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 10; YAL-AL00 Build/HUAWEIYAL-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10) NABar/2.0",
            "Mozilla/5.0 (Linux; Android 9; V1913A Build/P00610; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 10; CLT-TL01 Build/HUAWEICLT-TL01; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10)",
            "Mozilla/5.0 (Linux; Android 10; SM-G9750 Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.19 SP-engine/2.15.0 baiduboxapp/11.19.5.10 (Baidu; P1 10)",
            "Mozilla/5.0 (Linux; Android 10; LIO-AL00 Build/HUAWEILIO-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/6203 MicroMessenger/7.0.10.1580(0x27000AFC) Process/tools NetType/WIFI Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; U; Android 7.1.2; zh-cn; Redmi 5 Plus Build/N2G47H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/9.2 Mobile Safari/537.36",
            "Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_6 like Mac OS X) AppleWebKit/604.3.5 (KHTML, like Gecko) Version/11.0 MQQBrowser/10.1.0 Mobile/15B87 Safari/604.1 QBWebViewUA/2 QBWebViewType/1 WKType/1",
            "Mozilla/5.0 (Linux; Android 9; ONEPLUS A6000 Build/PKQ1.180716.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9) NABar/2.0",
            "Mozilla/5.0 (Linux; U; Android 4.4.2; zh-cn; OPPO_A59S Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/8.9 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 9; ALP-TL00 Build/HUAWEIALP-TL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 9; ELE-AL00 Build/HUAWEIELE-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/8968 MicroMessenger/7.0.12.1620(0x27000C36) Process/tools NetType/WIFI Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; U; Android 9; zh-cn; PACT00 Build/PPR1.180610.011) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/10.1 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; U; Android 10; zh-cn; Redmi K20 Pro Build/QKQ1.190825.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.141 Mobile Safari/537.36 XiaoMi/MiuiBrowser/11.8.14",
            "Mozilla/5.0 (Linux; U; Android 7.0; zh-cn; HUAWEI NXT-AL10 Build/HUAWEINXT-AL10) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.132 MQQBrowser/9.0 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 9; STK-AL00 Build/HUAWEISTK-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9) NABar/1.0",
            "Mozilla/5.0 (Linux; Android 9; Redmi 6 Pro Build/PKQ1.180917.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 7.1.2; Redmi 4X Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/63.0.3239.83 Mobile Safari/537.36 T7/11.12 baiduboxapp/11.12.3.2 (Baidu; P1 7.1.2)",
            "Mozilla/5.0 (Linux; Android 8.1.0; M1822 Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; U; Android 9; zh-CN; V1916A Build/PKQ1.190714.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.108 UCBrowser/12.8.2.1062 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 9; PBDM00 Build/PKQ1.190519.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.19 SP-engine/2.15.0 baiduboxapp/11.19.5.10 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9) NABar/2.0",
            "Mozilla/5.0 (Linux; Android 9; V1836A Build/PKQ1.181030.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 9; HWI-AL00 Build/HUAWEIHWI-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9) NABar/1.0",
            "Mozilla/5.0 (Linux; Android 9; JSN-AL00a Build/HONORJSN-AL00a; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9) NABar/1.0",
            "Mozilla/5.0 (Linux; Android 8.1.0; vivo X9s Build/OPM1.171019.019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; Android 8.1.0; vivo Y85A Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/63.0.3239.83 Mobile Safari/537.36 T7/11.1 baiduboxapp/11.1.0.10 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; Android 10; HMA-AL00 Build/HUAWEIHMA-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10) NABar/2.0",
            "Mozilla/5.0 (Linux; Android 8.1.0; 1809-A01 Build/OPM1; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.19 SP-engine/2.15.0 baiduboxapp/11.19.5.10 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; Android 9; SM-A7050 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; MI 5X Build/OPM1.171019.019) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/57.0.2987.108 UCBrowser/12.1.2.992 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 10; HMA-AL00 Build/HUAWEIHMA-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.2.2 (Baidu; P1 10)",
            "Mozilla/5.0 (Linux; Android 10; MI 8 SE Build/QKQ1.190828.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.17 SP-engine/2.13.0 baiduboxapp/11.17.0.13 (Baidu; P1 10)",
            "Mozilla/5.0 (Linux; U; Android 9; zh-cn; Redmi 7 Build/PKQ1.181021.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.141 Mobile Safari/537.36 XiaoMi/MiuiBrowser/11.8.14",
            "Mozilla/5.0 (Linux; U; Android 9; zh-cn; V1816A Build/PKQ1.180819.001) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/10.1 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 8.0.0; PIC-AL00 Build/HUAWEIPIC-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045129 Mobile Safari/537.36 MMWEBID/9451 MicroMessenger/7.0.12.1620(0x27000C37) Process/tools NetType/WIFI Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; Android 8.0.0; SM-C7010 Build/R16NW; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.0.0)",
            "Mozilla/5.0 (Linux; U; Android 10; zh-cn; Redmi Note 8 Pro Build/QP1A.190711.020) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.141 Mobile Safari/537.36 XiaoMi/MiuiBrowser/11.8.14",
            "Mozilla/5.0 (Linux; Android 8.1.0; V1732A Build/O11019; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; Android 10; ALP-AL00 Build/HUAWEIALP-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10) NABar/2.0",
            "Mozilla/5.0 (Linux; Android 8.0.0; PRA-TL10 Build/HONORPRA-TL10; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.0.0)",
            "Mozilla/5.0 (Linux; Android 9; HMA-AL00 Build/HUAWEIHMA-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36 MMWEBID/1247 MicroMessenger/7.0.10.1561(0x27000A41) Process/tools NetType/4G Language/zh_CN ABI/arm64 GPVersion/1",
            "Mozilla/5.0 (Linux; U; Android 9; zh-cn; INE-AL00 Build/HUAWEIINE-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/10.1 Mobile Safari/537.36",
            "Mozilla/5.0 (Linux; Android 9; LON-AL00 Build/HUAWEILON-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
            "Mozilla/5.0 (Linux; Android 10; BLA-TL00 Build/HUAWEIBLA-TL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 10)",
            "Mozilla/5.0 (Linux; Android 7.1.1; OPPO R11 Build/NMF26X; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 7.1.1)",
            "Mozilla/5.0 (Linux; Android 9; ELE-AL00 Build/HUAWEIELE-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 MMWEBID/8968 MicroMessenger/7.0.12.1620(0x27000C36) Process/tools NetType/4G Language/zh_CN ABI/arm64",
            "Mozilla/5.0 (Linux; U; Android 10; zh-cn; MIX 2S Build/QKQ1.190828.002) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.141 Mobile Safari/537.36 XiaoMi/MiuiBrowser/11.8.14",
            "Mozilla/5.0 (Linux; Android 8.1.0; vivo Y71A Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 8.1.0)",
            "Mozilla/5.0 (Linux; Android 7.0; BLN-AL40 Build/HONORBLN-AL40; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 MQQBrowser/6.2 TBS/045130 Mobile Safari/537.36 V1_AND_SQ_8.2.7_1334_YYB_D QQ/8.2.7.4410 NetType/4G WebP/0.3.0 Pixel/1080 StatusBarHeight/72 SimpleUISwitch/0",
            "Mozilla/5.0 (Linux; Android 9; ANE-AL00 Build/HUAWEIANE-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9)",
        ];

        public function mobileResolution(): array
        {
            $resolution = static::randomElement(static::$mobileResolutions);

            return explode('x', $resolution);
        }

        public function pcResolution(): array
        {
            $resolution = static::randomElement(static::$desktopResolutions);

            return explode('x', $resolution);
        }

        public function mobileUA(): string
        {
            return static::randomElement(static::$mobileUserAgent);
        }

        public function gender(): string
        {
            return static::randomElement([
                'male',
                'female',
                '',
            ]);
        }

        public static function getAcceptLanguages(): array
        {
            return [
                "el,fi;q=0.5",
                "de-de,de;q=0.8,en-us",
                "pl,en-us;q=0.7,en;q=",
                "zh-cn",
                "fr-ca",
                "en-us",
                "en-gb",
                "fr-be",
                "fr,de-ch;q=0.5",
                "fr",
                "fr-ch",
                "fr",
            ];
        }

        public function acceptLanguage(): string
        {
            return static::randomElement(self::getAcceptLanguages());
        }

        public function searchEngine(): string
        {
            return static::randomElement([
                '',
                'DuckDuckGo',
                'Google',
                'Bing',
                'Baidu',
                'Yahoo!',
                'Ask',
                'Babylon',
            ]);
        }

        public function searchEngineUrlWithKeyword($keyword): string
        {
            $url = static::randomElement([
                'http://www.google.com/search?sourceid=chrome&ie=UTF-8&q=',
                'http://www.google.it/url?sa=t&source=web&cd=2&q=',
                'http://www.google.de/search?ie=utf-8&oe=utf-8&aq=t&rls=org.mozilla:de:official&client=firefox-a&q=',
                'http://yandex.ru/yandsearch?lr=213&text=',
                'http://www.bing.com/search?FORM=IE8SRC&q=',
                'http://www.bing.com/search?q=',
                'http://uk.search.yahoo.com/search?ei=UTF-8&fr=moz35&q=',
                'http://search.yahoo.com/search;?p=',
                'http://uk.ask.com/web?l=dis&prt=NIS&chn=retail&geo=GB&ver=19&odn=&dm=all&q=',
            ]);

            return $url . $keyword;
        }

        public function searchEngineUrlWithOutKeyword(): string
        {
            $url = static::randomElement([
                'https://www.bing.com/',
                'https://duckduckgo.com/',
                'https://www.google.de/url?sa=t&source=web&rct=j&url=https://matomo.org/&ved=0ahUKEwi3qreZtuHaAhXEHpoKHXxxBxEQFggsMAA',
                'https://www.google.fr/',
                'http://r.search.yahoo.com/_ylt=AwrE1yEOwOZauucA_xoDEQx.;_ylu=X3oDMTByOHZyb21tBGNvbG8DYmYxBHBvcwMxBHZ0aWQDBHNlYwNzcg--/RV=2/RE=1525100687/RO=10/RU=https%3a%2f%2fmatomo.org%2f/RK=2/RS=QEhnjr714z0Me7kPhYj1gHrLTKc-',
                'http://search.yahoo.co.jp/r/FOR=wJjKBrpV3iiyQ9OVtYIAEFhwB6F4X7nB3uwubUjurHLqwT8oFNO7dNiZBXYbmgNENZz8yKntTR' . '5X_chrfaAcSOgPUyuK.Y5mOUs5tzKNLuq42vgCKLHdBH3gavAtCoKeCKOItwbkCN10nMDO9gO8MW9zdH9TOyAul7u1sqXEE0wTNp' . 'Y6DW.EFfagOL54JzI3OBVfIin7/_ylt=A2RAyhx.wOZaQWsATEuDTwx.;_ylu=X3oDMTBtNHJhZXRnBHBvcwMxBHNlYwNzcgRzbGsDdGl0bGU-/SIG=11fhbagaq/EXP=1525172798/**https%3A//matomo.jp/news/7540',
                'https://yandex.ru/',
            ]);

            return $url;
        }

    }
