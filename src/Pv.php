<?php

    namespace Coco\matomo;

    use Coco\magicAccess\MagicMethod;
    use \Exception;
    use Throwable;

    class Pv
    {
        // https://developer.matomo.org/api-reference/tracking-api
        // 下面的参数只作为写代码参考，构造参数用不上
        //Required parameters
        private int    $idsite;
        private string $rec = '1';


        //Recommended parameters
        private string $action_name = '';
        private string $url         = '';
        private string $_id         = '';
        private string $rand        = '';
        private string $apiv        = '1';


        //Pval User info
        private string $urlref = '';
        private string $res    = '';
        private string $h      = '';
        private string $m      = '';
        private string $s      = '';

        private string $fla   = '0';
        private string $java  = '0';
        private string $qt    = '0';
        private string $realp = '0';
        private string $pdf   = '0';
        private string $wma   = '0';
        private string $ag    = '0';

        private string $gears     = '0';
        private string $dir       = '0';
        private string $cookie    = '0';
        private string $ua        = '';
        private string $uadata    = '';
        private string $lang      = '';
        private string $uid       = '';
        private string $cid       = '';
        private string $new_visit = '0';
        private string $_cvar     = '';

        //Optional Acquisition Channel Attribution
        private string $_rcn = '';
        private string $_rck = '';

        //Optional Action info (measure Page view, Outlink, Download, Site search)
        private string $cvar         = '';
        private string $link         = '';
        private string $download     = '';
        private string $search       = '';
        private string $search_cat   = '';
        private string $search_count = '';
        private string $pv_id        = '';
        private string $idgoal       = '';
        private string $revenue      = '';
        private string $cs           = '';
        private string $ca           = '';

        //Optional Page Performance info
        private string $pf_net = '';
        private string $pf_srv = '';
        private string $pf_tfr = '';
        private string $pf_dm1 = '';
        private string $pf_dm2 = '';
        private string $pf_onl = '';

        //Optional Event Tracking info
        private string $e_c = '';
        private string $e_a = '';
        private string $e_n = '';
        private string $e_v = '';

        //Optional Content Tracking info
        private string $c_n = '';
        private string $c_p = '';
        private string $c_t = '';
        private string $c_i = '';

        //Optional Ecommerce info
        private string $ec_id    = '';
        private string $ec_items = '';
        private string $ec_st    = '';
        private string $ec_tx    = '';
        private string $ec_sh    = '';
        private string $ec_dt    = '';
        //Ecommerce Product View Tracking
        private string $_pkc = '';
        private string $_pkp = '';
        private string $_pks = '';
        private string $_pkn = '';

        //Other parameters (require authentication via token_auth)
        private string $token_auth = '';
        private string $cip        = '';
        private string $cdt        = '';
        private string $country    = '';
        private string $region     = '';
        private string $city       = '';
        private string $lat        = '';
        private string $long       = '';

        //Media Analytics parameters
        private string $ma_id  = '';
        private string $ma_ti  = '';
        private string $ma_re  = '';
        private string $ma_mt  = '';
        private string $ma_pn  = '';
        private string $ma_st  = '';
        private string $ma_le  = '';
        private string $ma_ps  = '';
        private string $ma_ttp = '';
        private string $ma_w   = '';
        private string $ma_h   = '';
        private string $ma_fs  = '';
        private string $ma_se  = '';

        //Tracking HTTP API Reference
        private string $cra    = '';
        private string $cra_st = '';
        private string $cra_ct = '';
        private string $cra_tp = '';
        private string $cra_ru = '';
        private string $cra_rl = '';
        private string $cra_rc = '';

        //Queued Tracking parameters
        private string $queuedtracking = '';
        private string $send_image     = '';
        private string $ping           = '';

        //Tracking Bots
        private string $bots = '';

        /*--------------------------------------------------------------------------------*/

        private array $ecommerceItems = [];
        private array $clientHints    = [];

        /*--------------------------------------------------------------------------------*/
        private string $pageCharset;
        private string $pageUrl = '';
        private ?int   $networkTime;
        private ?int   $serverTime;
        private ?int   $domProcessingTime;
        private ?int   $domCompletionTime;
        private ?int   $onLoadTime;
        private ?int   $transferTime;
        private string $urlReferrer;

        private array $pageCustomVar    = [];
        private array $eventCustomVar   = [];
        private array $visitorCustomVar = [];
        private array $customDimensions = [];
        private array $customParameters = [];
        private array $ecommerceView    = [];

        private string $acceptLanguage;
        private string $userAgent;
        private string $forcedDatetime;
        private bool   $forcedNewVisit = false;
        private string $ip;
        private string $userId;


        private int $localHour;
        private int $localMinute;
        private int $localSecond;
        private int $resolutionWidth;
        private int $resolutionHeight;

        private int $plugin_fla   = 0;
        private int $plugin_java  = 0;
        private int $plugin_qt    = 0;
        private int $plugin_realp = 0;
        private int $plugin_pdf   = 0;
        private int $plugin_wma   = 0;
        private int $plugin_ag    = 0;

        private string $sessionId;
        private int    $siteId;

        private array $trackerData = [
            "idsite" => 0,
            "rec"    => 1,
            "apiv"   => 1,
        ];

        /*--------------------------------------------------------------------------------*/

        protected function importTrackerData(array $data): static
        {
            foreach ($data as $k => $v)
            {
                $this->setTrackerData($k, $v);
            }

            return $this;
        }

        protected function setTrackerData(string $key, string|int $value): static
        {
            $this->trackerData[$key] = urlencode($value);

            return $this;
        }

        public function removeTrackerData(string $key): static
        {
            if (isset($this->trackerData[$key]))
            {
                unset($this->trackerData[$key]);
            }

            return $this;
        }

        /*--------------------------------------------------------------------------------*/

        public function setSessionId(string $sessionId): static
        {
            $this->sessionId = $sessionId;

            return $this;
        }

        public function setSiteId(int $siteId): static
        {
            $this->siteId = $siteId;

            return $this;
        }

        public function setPageUrl(string $url): static
        {
            $this->pageUrl = $url;

            return $this;
        }

        /*--------------------------------------------------------------------------------*/

        public function setPageCharset(string $charset): static
        {
            $this->pageCharset = $charset;

            return $this;
        }

        public function setUrlReferrer(string $url): static
        {
            $this->urlReferrer = $url;

            return $this;
        }

        /**
         * Overrides server date and time for the tracking requests.
         * By default Matomo will track requests for the "current datetime" but this function allows you
         * to track visits in the past. All times are in UTC.
         *
         * Allowed only for Admin/Super User, must be used along with setTokenAuth()
         *
         * @param string $dateTime Date with the format 'Y-m-d H:i:s', or a UNIX timestamp.
         *                         If the datetime is older than one day (default value for
         *                         tracking_requests_require_authentication_when_custom_timestamp_newer_than), then you
         *                         must call setTokenAuth() with a valid Admin/Super user token.
         *
         * @return $this
         */
        public function setForceVisitDateTime(string $dateTime): static
        {
            $this->forcedDatetime = $dateTime;

            return $this;
        }

        /**
         * Forces Matomo to create a new visit for the tracking request.
         *
         * By default, Matomo will create a new visit if the last request by this user was more than 30 minutes ago.
         * If you call setForceNewVisit() before calling doTrack*, then a new visit will be created for this request.
         *
         * @return $this
         */
        public function setForceNewVisit(): static
        {
            $this->forcedNewVisit = '1';

            return $this;
        }

        /**
         * Overrides IP address
         *
         * Allowed only for Admin/Super User, must be used along with setTokenAuth()
         *
         * @param string $ip IP string, eg. 130.54.2.1
         *
         * @return $this
         */
        public function setIp(string $ip): static
        {
            $this->ip = $ip;

            return $this;
        }

        /**
         * Sets local visitor time
         *
         * @param string $time HH:MM:SS format
         *
         * @return $this
         */
        public function setLocalTime(string $time): static
        {
            [
                $hour,
                $minute,
                $second,
            ] = explode(':', $time);

            $this->localHour   = (int)$hour;
            $this->localMinute = (int)$minute;
            $this->localSecond = (int)$second;

            return $this;
        }

        /**
         * Sets user resolution width and height.
         *
         * @param int $width
         * @param int $height
         *
         * @return $this
         */
        public function setResolution(int $width, int $height): static
        {
            $this->resolutionWidth  = $width;
            $this->resolutionHeight = $height;

            return $this;
        }

        /**
         * Force the action to be recorded for a specific User. The User ID is a string representing a given user in
         * your system.
         *
         * A User ID can be a username, UUID or an email address, or any number or string that uniquely identifies a
         * user or client.
         *
         * @param string $userId Any user ID string (eg. email address, ID, username). Must be non empty. Set to false
         *                       to de-assign a user id previously set.
         *
         * @return $this
         * @throws Exception
         */
        public function setUserId(string $userId): static
        {
            if ($userId === '')
            {
                throw new Exception("User ID cannot be empty.");
            }

            $this->userId = $userId;

            return $this;
        }

        /**
         * Sets timings for various browser performance metrics.
         *
         * @see https://developer.mozilla.org/en-US/docs/Web/API/PerformanceTiming
         *
         * @param null|int $network       Network time in ms (connectEnd – fetchStart)
         * @param null|int $server        Server time in ms (responseStart – requestStart)
         * @param null|int $transfer      Transfer time in ms (responseEnd – responseStart)
         * @param null|int $domProcessing DOM Processing to Interactive time in ms (domInteractive – domLoading)
         * @param null|int $domCompletion DOM Interactive to Complete time in ms (domComplete – domInteractive)
         * @param null|int $onload        Onload time in ms (loadEventEnd – loadEventStart)
         *
         * @return $this
         */
        public function setPerformanceTimings(?int $network = null, ?int $server = null, ?int $transfer = null, ?int $domProcessing = null, ?int $domCompletion = null, ?int $onload = null): static
        {
            $this->networkTime       = $network;
            $this->serverTime        = $server;
            $this->transferTime      = $transfer;
            $this->domProcessingTime = $domProcessing;
            $this->domCompletionTime = $domCompletion;
            $this->onLoadTime        = $onload;

            return $this;
        }


        /**
         * Sets Visit Custom Variable.
         * See https://matomo.org/docs/custom-variables/
         *
         * @param int    $id    Custom variable slot ID from 1-5
         * @param string $name  Custom variable name
         * @param string $value Custom variable value
         * @param string $scope Custom variable scope. Possible values: visit, page, event
         *
         * @return $this
         * @throws Exception
         */
        public function setCustomVariable(int $id, string $name, string $value, string $scope = 'visit'): static
        {
            if ($scope === 'page')
            {
                $this->pageCustomVar[$id] = [
                    $name,
                    $value,
                ];
            }
            elseif ($scope === 'event')
            {
                $this->eventCustomVar[$id] = [
                    $name,
                    $value,
                ];
            }
            elseif ($scope === 'visit')
            {
                $this->visitorCustomVar[$id] = [
                    $name,
                    $value,
                ];
            }
            else
            {
                throw new Exception("Invalid 'scope' parameter value");
            }

            return $this;
        }

        /**
         * Returns the currently assigned Custom Variable.
         *
         * If scope is 'visit', it will attempt to read the value set in the first party cookie created by Matomo
         * Tracker
         *  ($_COOKIE array).
         *
         * @param int    $id    Custom Variable integer index to fetch from cookie. Should be a value from 1 to 5
         * @param string $scope Custom variable scope. Possible values: visit, page, event
         *
         * @throws Exception
         * @see matomo.js getCustomVariable()
         */
        public function getCustomVariable(int $id, string $scope = 'visit'): mixed
        {
            if ($scope === 'page')
            {
                return $this->pageCustomVar[$id] ?? false;
            }

            if ($scope === 'event')
            {
                return $this->eventCustomVar[$id] ?? false;
            }

            if ($scope !== 'visit')
            {
                throw new Exception("Invalid 'scope' parameter value");
            }

            if (!empty($this->visitorCustomVar[$id]))
            {
                return $this->visitorCustomVar[$id];
            }

            return [];
        }


        /**
         * Sets a specific custom dimension
         *
         * @param int    $id    id of custom dimension
         * @param string $value value for custom dimension
         *
         * @return $this
         */
        public function setCustomDimension(int $id, string $value): static
        {
            $this->customDimensions['dimension' . $id] = $value;

            return $this;
        }


        /**
         * Returns the value of the custom dimension with the given id
         *
         * @param int $id id of custom dimension
         *
         * @return string|null
         */
        public function getCustomDimension(int $id): ?string
        {
            return $this->customDimensions['dimension' . $id] ?? null;
        }

        /**
         * Sets a custom tracking parameter. This is useful if you need to send any tracking parameters for a 3rd party
         * plugin that is not shipped with Matomo itself. Please note that custom parameters are cleared after each
         * tracking request.
         *
         * @param string $trackingApiParameter The name of the tracking API parameter, eg 'bw_bytes'
         * @param string $value                Tracking parameter value that shall be sent for this tracking parameter.
         *
         * @return $this
         * @throws Exception
         */
        public function setCustomTrackingParameter(string $trackingApiParameter, string $value): static
        {
            $matches = [];

            if (preg_match('/^dimension([0-9]+)$/', $trackingApiParameter, $matches))
            {
                $this->setCustomDimension($matches[1], $value);

                return $this;
            }

            $this->customParameters[$trackingApiParameter] = $value;

            return $this;
        }


        /**
         * Sets the Browser language. Used to guess visitor countries when GeoIP is not enabled
         *
         * @param string $acceptLanguage For example "fr-fr"
         *
         * @return $this
         */
        public function setBrowserLanguage(string $acceptLanguage): static
        {
            $this->acceptLanguage = $acceptLanguage;

            return $this;
        }

        /**
         * Sets the user agent, used to detect OS and browser.
         * If this function is not called, the User Agent will default to the current user agent.
         *
         * @param string $userAgent
         *
         * @return $this
         */
        public function setUserAgent(string $userAgent): static
        {
            $this->userAgent = $userAgent;

            return $this;
        }

        /**
         * Sets the country of the visitor. If not used, Matomo will try to find the country
         * using either the visitor's IP address or language.
         *
         * Allowed only for Admin/Super User, must be used along with setTokenAuth().
         *
         * @return $this
         */
        public function setCountry(string $country): static
        {
            $this->country = $country;

            return $this;
        }

        /**
         * Sets the region of the visitor. If not used, Matomo may try to find the region
         * using the visitor's IP address (if configured to do so).
         *
         * Allowed only for Admin/Super User, must be used along with setTokenAuth().
         *
         * @return $this
         */
        public function setRegion(string $region): static
        {
            $this->region = $region;

            return $this;
        }

        /**
         * Sets the city of the visitor. If not used, Matomo may try to find the city
         * using the visitor's IP address (if configured to do so).
         *
         * Allowed only for Admin/Super User, must be used along with setTokenAuth().
         *
         * @return $this
         */
        public function setCity(string $city): static
        {
            $this->city = $city;

            return $this;
        }

        /**
         * Sets the latitude of the visitor. If not used, Matomo may try to find the visitor's
         * latitude using the visitor's IP address (if configured to do so).
         *
         * Allowed only for Admin/Super User, must be used along with setTokenAuth().
         *
         * @return $this
         */
        public function setLatitude(float $lat): static
        {
            $this->lat = $lat;

            return $this;
        }

        /**
         * Sets the longitude of the visitor. If not used, Matomo may try to find the visitor's
         * longitude using the visitor's IP address (if configured to do so).
         *
         * Allowed only for Admin/Super User, must be used along with setTokenAuth().
         *
         * @return $this
         */
        public function setLongitude(float $long): static
        {
            $this->long = $long;

            return $this;
        }

        /**
         * Sets the client hints, used to detect OS and browser.
         * If this function is not called, the client hints sent with the current request will be used.
         *
         * Supported as of Matomo 4.12.0
         *
         * @param string                      $model           Value of the header 'HTTP_SEC_CH_UA_MODEL'
         * @param string                      $platform        Value of the header 'HTTP_SEC_CH_UA_PLATFORM'
         * @param string                      $platformVersion Value of the header 'HTTP_SEC_CH_UA_PLATFORM_VERSION'
         * @param string|array<string, mixed> $fullVersionList Value of header 'HTTP_SEC_CH_UA_FULL_VERSION_LIST'
         *                                                     or an array containing all brands with the structure
         *                                                     [['brand' => 'Chrome', 'version' => '10.0.2'], ['brand'
         *                                                     => '...]
         * @param string                      $uaFullVersion   Value of the header 'HTTP_SEC_CH_UA_FULL_VERSION'
         *
         * @return $this
         */
        public function setClientHints(string $model = '', string $platform = '', string $platformVersion = '', array|string $fullVersionList = '', string $uaFullVersion = ''): static
        {
            if (is_string($fullVersionList))
            {
                $reg  = '/^"([^"]+)"; ?v="([^"]+)"(?:, )?/';
                $list = [];

                while (\preg_match($reg, $fullVersionList, $matches))
                {
                    $list[]          = [
                        'brand'   => $matches[1],
                        'version' => $matches[2],
                    ];
                    $fullVersionList = \substr($fullVersionList, \strlen($matches[0]));
                }

                $fullVersionList = $list;
            }

            if (!is_array($fullVersionList))
            {
                $fullVersionList = [];
            }

            $this->clientHints = array_filter([
                'model'           => $model,
                'platform'        => $platform,
                'platformVersion' => $platformVersion,
                'uaFullVersion'   => $uaFullVersion,
                'fullVersionList' => $fullVersionList,
            ]);

            return $this;
        }

        /**
         * Sets visitor browser supported plugins
         *
         * @param bool $flash
         * @param bool $java
         * @param bool $quickTime
         * @param bool $realPlayer
         * @param bool $pdf
         * @param bool $windowsMedia
         * @param bool $silverlight
         *
         * @return $this
         */
        public function setPlugins(bool $flash = false, bool $java = false, bool $quickTime = false, bool $realPlayer = false, bool $pdf = false, bool $windowsMedia = false, bool $silverlight = false): static
        {
            $this->plugin_fla   = (int)$flash;
            $this->plugin_java  = (int)$java;
            $this->plugin_qt    = (int)$quickTime;
            $this->plugin_realp = (int)$realPlayer;
            $this->plugin_pdf   = (int)$pdf;
            $this->plugin_wma   = (int)$windowsMedia;
            $this->plugin_ag    = (int)$silverlight;

            return $this;
        }


        /*--------------------------------------------------------------------------------*/

        /**
         * Adds an item in the Ecommerce order.
         *
         * This should be called before doTrackEcommerceOrder(), or before doTrackEcommerceCartUpdate().
         * This function can be called for all individual products in the cart (or order).
         * SKU parameter is mandatory. Other parameters are optional (set to false if value not known).
         * Ecommerce items added via this function are automatically cleared when doTrackEcommerceOrder() or
         * getUrlTrackEcommerceOrder() is called.
         *
         * @param string    $sku         (required) SKU, Product identifier
         * @param string    $name        (optional) Product name
         * @param array     $category    (optional) Product category, or array of product categories (up to 5
         *                               categories can be specified for a given product)
         * @param float|int $price       (optional) Individual product price (supports integer and decimal prices)
         * @param int       $quantity    (optional) Product quantity. If not specified, will default to 1 in the
         *                               Reports
         *
         * @return $this
         * @throws Exception
         */
        public function addEcommerceItem(string $sku, string $name = '', array $category = [], float|int $price = 0.0, int $quantity = 1): static
        {
            if (empty($sku))
            {
                throw new Exception("You must specify a SKU for the Ecommerce item");
            }

            $price = $this->forceDotAsSeparatorForDecimalPoint($price);

            $this->ecommerceItems[] = [
                $sku,
                $name,
                $category,
                $price,
                $quantity,
            ];

            return $this;
        }

        /**
         * Sets the current page view as an item (product) page view, or an Ecommerce Category page view.
         *
         * This must be called before doTrackPageView() on this product/category page.
         *
         * On a category page, you may set the parameter $category only and set the other parameters to false.
         *
         * Tracking Product/Category page views will allow Matomo to report on Product & Categories
         * conversion rates (Conversion rate = Ecommerce orders containing this product or category / Visits to the
         * product or category)
         *
         * @param string $sku             Product SKU being viewed
         * @param string $name            Product Name being viewed
         * @param array  $category        Category being viewed. On a Product page, this is the product's category.
         *                                You can also specify an array of up to 5 categories for a given page view.
         * @param float  $price           Specify the price at which the item was displayed
         *
         * @return $this
         */
        public function setEcommerceView(string $sku = '', string $name = '', array $category = [], float $price = 0.0): static
        {
            $category = json_encode($category);

            $this->ecommerceView['_pkc'] = $category;

            if (!empty($price))
            {
                $price                       = $this->forceDotAsSeparatorForDecimalPoint($price);
                $this->ecommerceView['_pkp'] = $price;
            }

            // On a category page, do not record "Product name not defined"
            if (empty($sku) && empty($name))
            {
                return $this;
            }

            if (!empty($sku))
            {
                $this->ecommerceView['_pks'] = $sku;
            }

            if (empty($name))
            {
                $name = '';
            }

            $this->ecommerceView['_pkn'] = $name;

            return $this;
        }


        /**
         * Tracks a content impression
         *
         * @param string      $contentName   The name of the content. For instance 'Ad Foo Bar'
         * @param string      $contentPiece  The actual content. For instance the path to an image, video, audio, any
         *                                   text
         * @param bool|string $contentTarget (optional) The target of the content. For instance the URL of a landing
         *                                   page.
         *
         * @throws Exception
         */
        public function getUrlTrackContentImpression(string $contentName, string $contentPiece = 'Unknown', bool|string $contentTarget = false): static
        {
            if (strlen($contentName) == 0)
            {
                throw new Exception("You must specify a content name");
            }

            $this->setTrackerData('c_n', $contentName);

            if (!empty($contentPiece) && strlen($contentPiece) > 0)
            {
                $this->setTrackerData('c_p', $contentPiece);
            }
            if (!empty($contentTarget) && strlen($contentTarget) > 0)
            {
                $this->setTrackerData('c_t', $contentTarget);
            }

            return $this;
        }

        /**
         * Tracks an event
         *
         * @param string      $category The Event Category (Videos, Music, Games...)
         * @param string      $action   The Event's Action (Play, Pause, Duration, Add Playlist, Downloaded,
         *                              Clicked...)
         * @param bool|string $name     (optional) The Event's object Name (a particular Movie name, or Song name, or
         *                              File name...)
         * @param float|bool  $value    (optional) The Event's value
         *
         * @throws Exception
         */
        public function getUrlTrackEvent(string $category, string $action, bool|string $name = false, float|bool $value = false): static
        {
            if (strlen($category) == 0)
            {
                throw new Exception("You must specify an Event Category name (Music, Videos, Games...).");
            }
            if (strlen($action) == 0)
            {
                throw new Exception("You must specify an Event action (click, view, add...).");
            }

            $this->setTrackerData('e_c', $category);
            $this->setTrackerData('e_a', $action);

            if (strlen($name) > 0)
            {
                $this->setTrackerData('e_n', $name);
            }
            if (strlen($value) > 0)
            {
                $this->setTrackerData('e_v', $value);
            }

            return $this;
        }

        /**
         * Tracks a page view
         *
         * @param string $documentTitle Page title as it will appear in the Actions > Page titles report
         *
         */
        public function getUrlTrackPageView(string $documentTitle): static
        {
            if (strlen($documentTitle) > 0)
            {
                $this->setTrackerData('action_name', $documentTitle);
            }

            return $this;
        }

        /**
         * Tracks a content interaction. Make sure you have tracked a content impression using the same content name
         * and
         * content piece, otherwise it will not count. To do so you should call the method doTrackContentImpression();
         *
         * @param string      $interaction   The name of the interaction with the content. For instance a 'click'
         * @param string      $contentName   The name of the content. For instance 'Ad Foo Bar'
         * @param string      $contentPiece  The actual content. For instance the path to an image, video, audio, any
         *                                   text
         * @param string|bool $contentTarget (optional) The target the content leading to when an interaction occurs.
         *                                   For instance the URL of a landing page.
         *
         * @throws Exception
         */
        public function getUrlTrackContentInteraction($interaction, $contentName, $contentPiece = 'Unknown', $contentTarget = false): static
        {
            if (strlen($interaction) == 0)
            {
                throw new Exception("You must specify a name for the interaction");
            }

            if (strlen($contentName) == 0)
            {
                throw new Exception("You must specify a content name");
            }

            $this->setTrackerData('c_i', $interaction);
            $this->setTrackerData('c_n', $contentName);

            if (!empty($contentPiece) && strlen($contentPiece) > 0)
            {
                $this->setTrackerData('c_p', $contentPiece);
            }

            if (!empty($contentTarget) && strlen($contentTarget) > 0)
            {
                $this->setTrackerData('c_t', $contentTarget);
            }

            return $this;
        }

        /**
         * Tracks an internal Site Search query, and optionally tracks the Search Category, and Search results Count.
         * These are used to populate reports in Actions > Site Search.
         *
         * @param string   $keyword      Searched query on the site
         * @param string   $engine       (optional) Search engine category if applicable
         * @param bool|int $countResults (optional) results displayed on the search result page. Used to track "zero
         *                               result" keywords.
         */
        public function getUrlTrackSiteSearch(string $keyword, string $engine = '', bool|int $countResults = false): static
        {
            $this->setTrackerData('search', $keyword);
            if (strlen($engine) > 0)
            {
                $this->setTrackerData('search_cat', $engine);
            }

            if (!empty($countResults) || $countResults === 0)
            {
                $this->setTrackerData('search_count', (int)$countResults);
            }

            return $this;
        }

        /**
         * Records a Goal conversion
         *
         * @param int   $idGoal  Id Goal to record a conversion
         * @param float $revenue Revenue for this conversion
         *
         */
        public function getUrlTrackGoal(int $idGoal, float $revenue = 0.0): static
        {
            $this->setTrackerData('idgoal', $idGoal);
            if (!empty($revenue))
            {
                $revenue = $this->forceDotAsSeparatorForDecimalPoint($revenue);
                $this->setTrackerData('revenue', $revenue);
            }

            return $this;
        }

        /**
         * Tracks a download or outlink
         *
         * @param string $actionUrl  URL of the download or outlink
         * @param string $actionType Type of the action: 'download' or 'link'
         *
         */
        public function getUrlTrackAction(string $actionUrl, string $actionType): static
        {
            $this->setTrackerData($actionType, $actionUrl);

            return $this;
        }

        /**
         * Tracks an Ecommerce order.
         *
         * If the Ecommerce order contains items (products), you must call first the addEcommerceItem() for each item
         * in the order. All revenues (grandTotal, subTotal, tax, shipping, discount) will be individually summed and
         * reported in Matomo reports. Only the parameters $orderId and $grandTotal are required.
         *
         * @param string $orderId        (required) Unique Order ID.
         *                               This will be used to count this order only once in the event the order page is
         *                               reloaded several times. orderId must be unique for each transaction, even on
         *                               different days, or the transaction will not be recorded by Matomo.
         * @param float  $grandTotal     (required) Grand Total revenue of the transaction (including tax, shipping,
         *                               etc.)
         * @param float  $subTotal       (optional) Sub total amount, typically the sum of items prices for all items
         *                               in this order (before Tax and Shipping costs are applied)
         * @param float  $tax            (optional) Tax amount for this order
         * @param float  $shipping       (optional) Shipping amount for this order
         * @param float  $discount       (optional) Discounted amount in this order
         *
         * @throws Exception
         */
        public function getUrlTrackEcommerceOrder(string $orderId, float $grandTotal, float $subTotal = 0.0, float $tax = 0.0, float $shipping = 0.0, float $discount = 0.0): static
        {
            if (empty($orderId))
            {
                throw new Exception("You must specifiy an orderId for the Ecommerce order");
            }

            $this->getUrlTrackEcommerce($grandTotal, $subTotal, $tax, $shipping, $discount);
            $this->setTrackerData('ec_id', $orderId);

            return $this;
        }

        /**
         * Tracks a PHP Throwable a crash (requires CrashAnalytics to be enabled in the target Matomo)
         *
         * @param Throwable   $ex       (required) the throwable to track. The message, stack trace, file location and
         *                              line number of the crash are deduced from this parameter. The crash type is set
         *                              to the class name of the Throwable.
         * @param string|null $category (optional) a category value for this crash. This can be any information you
         *                              want
         *                              to attach to the crash.
         *
         */
        public function getUrlTrackPhpThrowable(\Throwable $ex, string $category = null): static
        {
            $message  = $ex->getMessage();
            $stack    = $ex->getTraceAsString();
            $type     = get_class($ex);
            $location = $ex->getFile();
            $line     = $ex->getLine();

            return $this->getUrlTrackCrash($message, $type, $category, $stack, $location, $line);
        }

        /**
         * Track a crash (requires CrashAnalytics to be enabled in the target Matomo)
         *
         * @param string      $message  (required) the error message.
         * @param string|null $type     (optional) the error type, such as the class name of an Exception.
         * @param string|null $category (optional) a category value for this crash. This can be any information you want
         *                              to attach to the crash.
         * @param string|null $stack    (optional) the stack trace of the crash.
         * @param string|null $location (optional) the source file URI where the crash originated.
         * @param int|null    $line     (optional) the source file line where the crash originated.
         * @param int|null    $column   (optional) the source file column where the crash originated.
         *
         */
        public function getUrlTrackCrash(string $message, string $type = null, $category = null, $stack = null, $location = null, $line = null, $column = null): static
        {
            $this->setTrackerData('ca', 1);
            $this->setTrackerData('cra', $message);

            if ($type)
            {
                $this->setTrackerData('cra_tp', $type);
            }
            if ($category)
            {
                $this->setTrackerData('cra_ct', $category);
            }
            if ($stack)
            {
                $this->setTrackerData('cra_st', $stack);
            }
            if ($location)
            {
                $this->setTrackerData('cra_ru', $location);
            }
            if ($line)
            {
                $this->setTrackerData('cra_rl', $line);
            }
            if ($column)
            {
                $this->setTrackerData('cra_rc', $column);
            }

            return $this;
        }

        /**
         * Returns URL used to track Ecommerce orders
         *
         * Calling this function will reinitializes the property ecommerceItems to empty array
         * so items will have to be added again via addEcommerceItem()
         *
         */
        public function getUrlTrackEcommerce($grandTotal, $subTotal = 0.0, $tax = 0.0, $shipping = 0.0, $discount = 0.0): static
        {
            if (!is_numeric($grandTotal))
            {
                throw new Exception("You must specifiy a grandTotal for the Ecommerce order (or Cart update)");
            }

            $this->setTrackerData('idgoal', 0);

            if (!empty($grandTotal))
            {
                $grandTotal = $this->forceDotAsSeparatorForDecimalPoint($grandTotal);

                $this->setTrackerData('revenue', $grandTotal);
            }

            if (!empty($subTotal))
            {
                $subTotal = $this->forceDotAsSeparatorForDecimalPoint($subTotal);
                $this->setTrackerData('ec_st', $subTotal);
            }

            if (!empty($tax))
            {
                $tax = $this->forceDotAsSeparatorForDecimalPoint($tax);
                $this->setTrackerData('ec_tx', $tax);
            }

            if (!empty($shipping))
            {
                $shipping = $this->forceDotAsSeparatorForDecimalPoint($shipping);
                $this->setTrackerData('ec_sh', $shipping);

            }

            if (!empty($discount))
            {
                $discount = $this->forceDotAsSeparatorForDecimalPoint($discount);
                $this->setTrackerData('ec_dt', $discount);
            }

            if (count($this->ecommerceItems))
            {
                $this->setTrackerData('ec_items', json_encode($this->ecommerceItems));
            }

            return $this;
        }

        /**
         * Sends a ping request.
         *
         * Ping requests do not track new actions. If they are sent within the standard visit length (see
         * global.ini.php), they will extend the existing visit and the current last action for the visit. If after the
         * standard visit length, ping requests will create a new visit using the last action in the last known visit.
         *
         * @return Pv
         */
        public function getUrlPing(): static
        {
            $this->setTrackerData('ping', 1);

            return $this;
        }

        /*--------------------------------------------------------------------------------*/

        public function makeUrl(): string
        {
            $this->setTrackerData('idsite', $this->siteId);
            $this->setTrackerData('_id', $this->sessionId);
            $this->setTrackerData('r', substr(strval(mt_rand()), 2, 6));

            if (!empty($this->ip))
            {
                $this->setTrackerData('cip', $this->ip);
            }

            if (!empty($this->userId))
            {
                $this->setTrackerData('uid', $this->userId);
            }

            if (!empty($this->forcedDatetime))
            {
                $this->setTrackerData('cdt', $this->forcedDatetime);
            }

            if ($this->forcedNewVisit)
            {
                $this->setTrackerData('new_visit', 1);
            }

            $this->setTrackerData('fla', $this->plugin_fla);
            $this->setTrackerData('java', $this->plugin_java);
            $this->setTrackerData('qt', $this->plugin_qt);
            $this->setTrackerData('realp', $this->plugin_realp);
            $this->setTrackerData('pdf', $this->plugin_pdf);
            $this->setTrackerData('wma', $this->plugin_wma);
            $this->setTrackerData('ag', $this->plugin_ag);

            if (!empty($this->localHour) && !empty($this->localMinute) && !empty($this->localSecond))
            {
                $this->setTrackerData('h', $this->localHour);
                $this->setTrackerData('m', $this->localMinute);
                $this->setTrackerData('s', $this->localSecond);
            }

            if (!empty($this->resolutionHeight) && !empty($this->resolutionWidth))
            {
                $this->setTrackerData('res', $this->resolutionHeight . 'x' . $this->resolutionWidth);
            }

            if ($this->visitorCustomVar)
            {
                $this->setTrackerData('_cvar', json_encode($this->visitorCustomVar));
            }

            if ($this->pageCustomVar)
            {
                $this->setTrackerData('cvar', json_encode($this->pageCustomVar));
            }

            if ($this->eventCustomVar)
            {
                $this->setTrackerData('e_cvar', json_encode($this->eventCustomVar));
            }

            if (!empty($this->pageCharset))
            {
                $this->setTrackerData('cs', $this->pageCharset);
            }

            if (!empty($this->pageUrl))
            {
                $this->setTrackerData('url', $this->pageUrl);
            }

            if (!empty($this->urlReferrer))
            {
                $this->setTrackerData('urlref', $this->urlReferrer);
            }

            if (!empty($this->country))
            {
                $this->setTrackerData('country', $this->country);
            }

            if (!empty($this->region))
            {
                $this->setTrackerData('region', $this->region);
            }

            if (!empty($this->city))
            {
                $this->setTrackerData('city', $this->city);
            }

            if (!empty($this->lat))
            {
                $this->setTrackerData('lat', $this->lat);
            }

            if (!empty($this->long))
            {
                $this->setTrackerData('long', $this->long);
            }

            if (($this->clientHints))
            {
                $this->setTrackerData('uadata', json_encode($this->clientHints));
            }

            $this->setTrackerData('pv_id', static::generateNewPageviewId());

            if (!empty($this->networkTime))
            {
                $this->setTrackerData('pf_net', (int)$this->networkTime);
            }
            if (!empty($this->serverTime))
            {
                $this->setTrackerData('pf_srv', (int)$this->serverTime);
            }
            if (!empty($this->transferTime))
            {
                $this->setTrackerData('pf_tfr', (int)$this->transferTime);
            }
            if (!empty($this->domProcessingTime))
            {
                $this->setTrackerData('pf_dm1', (int)$this->domProcessingTime);
            }
            if (!empty($this->domCompletionTime))
            {
                $this->setTrackerData('pf_dm2', (int)$this->domCompletionTime);
            }
            if (!empty($this->onLoadTime))
            {
                $this->setTrackerData('pf_onl', (int)$this->onLoadTime);
            }

            if (!empty($this->userAgent))
            {
                $this->setTrackerData('ua', $this->userAgent);
            }

            if (!empty($this->acceptLanguage))
            {
                $this->setTrackerData('lang', $this->acceptLanguage);
            }

            $this->setTrackerData('cookie', 1);
            $this->importTrackerData($this->customParameters);
            $this->importTrackerData($this->customDimensions);
            $this->importTrackerData($this->ecommerceView);

            $data = [];
            foreach ($this->trackerData as $k => $v)
            {
                $data[] = $k . '=' . $v;
            }

            return '?' . implode('&', $data);
        }

        /**
         * Force the separator for decimal point to be a dot. See https://github.com/matomo-org/matomo/issues/6435
         * If for instance a German locale is used it would be a comma otherwise.
         *
         * @param float|string $value
         */
        private function forceDotAsSeparatorForDecimalPoint($value): array|bool|string
        {
            return str_replace(',', '.', $value);
        }

        private static function generateNewPageviewId(): string
        {
            return substr(md5(uniqid(rand(), true)), 0, 6);
        }

        /**
         * Hash function used internally by Matomo to hash a User ID into the Visitor ID.
         *
         * @param $id
         *
         * @return string
         */
        public static function getUserIdHashed($id): string
        {
            return substr(sha1($id), 0, 16);
        }

    }

