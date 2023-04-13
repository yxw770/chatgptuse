<?php
namespace model {
    class model
    {
        private $db;
        private $dbconfig;
        private $db_prefix = '';
        public $table;
        private $tableid;
        private $format = [];
        private $where = '';
        private $field = "\x2a";
        private $bind = [];
        private $join = '';
        private $groupby = '';
        private $having = '';
        private $orderby = '';
        private $limit = '';
        private $forupdate = '';
        private $currentpage;
        private $pagesize;
        private $pagelen;
        private $pager;
        private $begin = false;
        protected $data;
        public $rules;
        private $ruleresult;
        private $linker;
        private $linkerbind = [];
        private $findone;
        private $keyword;
        private $keyword_array;
        private $match;
        private $matchtype;
        public $link = null;
        private $isdump = false;
        private $iscount = false;
        private static $_instance = NULL;
        public static function getInstance($anriF, $xkJ01)
        {
            if (!is_null(self::$_instance)) {
                goto jPT6D;
            }
            self::$_instance = new self($anriF, $xkJ01);
            jPT6D:
            $T_qYT = [];
            if (!$xkJ01) {
                goto yw2Gp;
            }
            $C2Sao = WEB . DS . M . DS . "\x6d\157\x64\145\154" . DS . $anriF["\x64\141\164\x61\142\x61\x73\x65"] . DS . $xkJ01 . "\x2e\x70\150\160";
            if (!is_file($C2Sao)) {
                goto CQBfS;
            }
            $T_qYT = (require $C2Sao);
            CQBfS:
            if (!$anriF["\160\162\145\x66\x69\x78"]) {
                goto xDyDN;
            }
            $BnA41 = $anriF["\160\x72\145\x66\x69\x78"];
            $xkJ01 = $BnA41 . $xkJ01;
            xDyDN:
            yw2Gp:
            self::$_instance->table = $xkJ01;
            self::$_instance->link = $T_qYT;
            return self::$_instance;
        }
        private function __construct($anriF, $xkJ01 = false)
        {
            $this->dbconfig = $anriF;
            $this->connect();
        }
        public function __clone()
        {
            E("\344\xb8\215\xe5\x85\201\350\256\xb8\xe5\x85\213\351\x9a\x86\346\240\xb8\xe5\277\203\346\250\241\xe5\236\x8b\347\xb1\xbb");
        }
        private function connect()
        {
            $anriF = $this->dbconfig;
            if ($anriF) {
                goto InC0t;
            }
            E("\xe6\234\xaa\xe6\211\276\345\210\xb0\xe6\x95\260\346\x8d\xae\345\272\x93\351\x85\215\xe7\275\256\344\277\xa1\xe6\x81\257");
            goto HLNFD;
            InC0t:
            $w1j3p = $anriF["\150\157\163\x74"];
            $M6SPQ = $anriF["\x75\163\145\162"];
            $AxQcv = $anriF["\160\141\x73\x73\x77\x6f\162\x64"];
            $tpoLz = $anriF["\x64\141\164\141\x62\141\x73\x65"];
            $this->db_prefix = $anriF["\160\162\x65\x66\151\x78"];
            $Q9dB9 = new \PDO("\x6d\171\163\x71\154\x3a\x68\157\163\x74\x3d{$w1j3p}\73\144\x62\156\x61\155\x65\75{$tpoLz}\73\143\x68\x61\162\x73\x65\x74\75\165\164\x66\x38\x6d\x62\x34", $M6SPQ, $AxQcv, [\PDO::MYSQL_ATTR_MULTI_STATEMENTS => false]);
            $Q9dB9->exec("\163\x65\x74\40\156\x61\155\x65\163\40\165\164\146\x38\x6d\x62\x34");
            $Q9dB9->setAttribute(\PDO::ATTR_STRINGIFY_FETCHES, false);
            $Q9dB9->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $Q9dB9->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db = $Q9dB9;
            HLNFD:
        }
        public function mmorder($n0jiY)
        {
            $N4Sve = $this->fields();
            $oKQkn = [];
            $Yue22 = ["\x61\163\143", "\x64\145\x73\x63"];
            foreach ($n0jiY as $vUVC5 => $barO2) {
                if (!(in_array($barO2["\156\141\x6d\x65"], $N4Sve) && in_array(strtolower($barO2["\x73\x6f\162\x74"]), $Yue22))) {
                    goto QVftn;
                }
                $oKQkn[] = $barO2["\156\141\155\x65"] . "\40" . $barO2["\163\x6f\162\164"];
                QVftn:
                PRYIn:
            }
            KjmyY:
            return $oKQkn;
        }
        public function dbname()
        {
            $YFmXg = $this->db;
            $L_4na = $YFmXg->query("\x73\145\154\x65\x63\164\40\x64\x61\164\141\142\141\x73\145\50\x29\73");
            $P14n0 = $L_4na->fetch(\PDO::FETCH_NUM);
            return $P14n0;
        }
        public function table($xkJ01 = false)
        {
            if ($xkJ01) {
                goto ic_d_;
            }
            E("\164\x61\142\x6c\x65\xe6\x96\xb9\346\xb3\x95\345\x8f\202\346\225\xb0\344\270\215\xe8\203\275\xe4\xb8\272\xe7\251\xba");
            goto VEUUP;
            ic_d_:
            $anriF = $this->dbconfig;
            $C2Sao = WEB . DS . M . DS . "\x6d\157\x64\x65\154" . DS . $anriF["\x64\141\164\x61\142\x61\163\145"] . DS . $xkJ01 . "\x2e\160\x68\160";
            if (!is_file($C2Sao)) {
                goto KYx3K;
            }
            if ($this->link) {
                goto h6RQO;
            }
            $this->link = (require $C2Sao);
            h6RQO:
            KYx3K:
            $this->table = $this->db_prefix . $xkJ01;
            return $this;
            VEUUP:
        }
        public function keyword($dfvgc = '')
        {
            if ($dfvgc || is_numeric($dfvgc)) {
                goto WIh9p;
            }
            E("\350\xaf\267\350\xbe\223\345\x85\xa5\345\x85\263\351\224\xae\350\257\x8d");
            goto WeZ0W;
            WIh9p:
            if (is_array($dfvgc)) {
                goto g0IJZ;
            }
            $this->keyword = $dfvgc;
            goto A6dAh;
            g0IJZ:
            $N4Sve = $this->fields();
            foreach ($dfvgc as $vUVC5 => $barO2) {
                if (in_array($vUVC5, $N4Sve)) {
                    goto W0vEB;
                }
                unset($dfvgc[$vUVC5]);
                W0vEB:
                r8ect:
            }
            IVEYg:
            $dfvgc = array_filter($dfvgc, "\x61\x72\162\141\171\x66\151\x6c\x74\145\x72");
            $this->keyword_array = $dfvgc;
            A6dAh:
            WeZ0W:
            return $this;
        }
        public function match($N4Sve = false)
        {
            if ($N4Sve) {
                goto MaOZe;
            }
            E("\350\xaf\xb7\350\276\x93\xe5\x85\245\xe9\x9c\x80\350\xa6\201\xe5\x8c\271\351\x85\215\347\232\204\345\xad\x97\xe6\256\265\345\220\215\xe7\247\xb0\42\x2c\42\345\x8f\267\345\x88\x86\xe9\x9a\224\347\232\204\xe5\255\x97\xe7\254\xa6\xe4\xb8\xb2");
            goto gDWS2;
            MaOZe:
            $xkJ01 = $this->table;
            if ($xkJ01) {
                goto Mdyna;
            }
            E("\x74\x61\x62\x6c\145\xe6\226\271\xe6\263\225\xe5\x8f\x82\346\x95\260\344\270\x8d\350\x83\275\344\xb8\xba\xe7\xa9\272");
            goto iptNp;
            Mdyna:
            $this->match = $N4Sve;
            iptNp:
            gDWS2:
            return $this;
        }
        private function fields_type($xkJ01 = false)
        {
            $YFmXg = $this->db;
            if ($xkJ01) {
                goto rWIya;
            }
            $xkJ01 = $this->table;
            rWIya:
            if ($xkJ01) {
                goto ubNg0;
            }
            E("\350\257\267\xe8\xbe\223\xe5\205\xa5\350\xa1\250\xe5\220\215\345\217\x82\xe6\x95\xb0");
            ubNg0:
            preg_match("\x23\x5e\x28\56\x2b\77\x29\x5b\x5c\x73\x5d\x2b\77\50\141\163\x29\133\x5c\163\135\x2b\x3f\x28\56\53\77\51\44\x23", $xkJ01, $nvjFv);
            if (!isset($nvjFv[1])) {
                goto vF2Qo;
            }
            $xkJ01 = $nvjFv[1];
            vF2Qo:
            $a3xpt = $YFmXg->query("\123\110\x4f\127\40\103\x4f\114\x55\x4d\x4e\123\40\x46\122\x4f\115\40{$xkJ01}");
            $R_RFq = $a3xpt->fetchAll(\PDO::FETCH_ASSOC);
            return $R_RFq;
        }
        public function fields($xkJ01 = false)
        {
            $YFmXg = $this->db;
            if ($xkJ01) {
                goto je8D5;
            }
            $xkJ01 = $this->table;
            je8D5:
            if ($xkJ01) {
                goto v_6j4;
            }
            E("\350\xaf\xb7\350\276\x93\345\x85\245\xe8\241\xa8\xe5\220\x8d\345\217\x82\346\x95\xb0");
            v_6j4:
            preg_match("\43\x5e\50\x2e\53\x3f\x29\133\x5c\x73\x5d\x2b\x3f\x28\141\163\x29\133\x5c\163\x5d\53\x3f\50\56\x2b\77\51\x24\43", $xkJ01, $nvjFv);
            if (!isset($nvjFv[1])) {
                goto ovrcV;
            }
            $xkJ01 = $nvjFv[1];
            ovrcV:
            $a3xpt = $YFmXg->query("\123\110\117\127\x20\103\117\x4c\125\115\116\x53\40\x46\122\x4f\x4d\40{$xkJ01}");
            $R_RFq = $a3xpt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($R_RFq as $vUVC5 => $barO2) {
                $R_RFq[$vUVC5] = $barO2["\x46\x69\x65\x6c\x64"];
                D3BeH:
            }
            AG2up:
            return $R_RFq;
        }
        public function field($NyF4O = "\x2a")
        {
            $NyF4O = trim($NyF4O);
            $YFmXg = $this->db;
            if (!($NyF4O && $NyF4O != "\x2a")) {
                goto yDcIT;
            }
            $aBgTQ = $this->db_prefix;
            if (!$aBgTQ) {
                goto AQW1z;
            }
            $NyF4O = explode("\x2c", $NyF4O);
            $NyF4O = array_map(function ($barO2) use($aBgTQ, $YFmXg) {
                if (strpos($barO2, "\56") === false) {
                    goto c6okH;
                }
                $yHerg = explode("\56", $barO2);
                $yHerg = $yHerg[0];
                $bd5s7 = $YFmXg->query("\x53\110\x4f\127\x20\124\x41\x42\x4c\105\123\x20\114\x49\113\x45\x20\47" . $aBgTQ . $yHerg . "\x27");
                $SEbWM = $bd5s7->fetchAll();
                if ($SEbWM) {
                    goto axoQ0;
                }
                return $barO2;
                goto uumn2;
                axoQ0:
                return $aBgTQ . $barO2;
                uumn2:
                goto eekkU;
                c6okH:
                return $barO2;
                eekkU:
            }, $NyF4O);
            $NyF4O = implode("\x2c", $NyF4O);
            AQW1z:
            yDcIT:
            $this->field = $NyF4O;
            return $this;
        }
        public function nofield($gQszr = false)
        {
            $xkJ01 = $this->table;
            $xkJ01 = array_map("\164\x72\x69\x6d", explode("\x20\141\x73\x20", $xkJ01));
            if (!$gQszr) {
                goto vXzO6;
            }
            $gQszr = explode("\x2c", $gQszr);
            $N4Sve = $this->fields();
            foreach ($N4Sve as $vUVC5 => $barO2) {
                if (!isset($xkJ01[1])) {
                    goto h5pg4;
                }
                $N4Sve[$vUVC5] = "{$xkJ01[1]}\x2e{$barO2}";
                h5pg4:
                lOLKp:
            }
            WRKCW:
            foreach ($gQszr as $barO2) {
                $l70RJ = array_search($barO2, $N4Sve);
                if (!($l70RJ !== false)) {
                    goto PzRwl;
                }
                unset($N4Sve[$l70RJ]);
                PzRwl:
                OmKRw:
            }
            uYUfq:
            $N4Sve = implode("\x2c", $N4Sve);
            $this->field = $N4Sve;
            vXzO6:
            return $this;
        }
        public function primary($xkJ01 = false)
        {
            $YFmXg = $this->db;
            if ($xkJ01) {
                goto ec9Y7;
            }
            $xkJ01 = $this->table;
            ec9Y7:
            $xkJ01 = explode("\x20", trim($xkJ01));
            $xkJ01 = $xkJ01[0];
            $a3xpt = $YFmXg->query("\123\110\x4f\x57\40\x43\x4f\114\x55\x4d\x4e\123\40\x46\122\117\x4d\x20{$xkJ01}");
            $R_RFq = $a3xpt->fetchAll(\PDO::FETCH_ASSOC);
            $WFU8N = '';
            foreach ($R_RFq as $barO2) {
                if (!($barO2["\113\x65\x79"] == "\x50\x52\111")) {
                    goto fH5Qw;
                }
                $WFU8N = $barO2["\106\x69\145\154\144"];
                fH5Qw:
                GN3xC:
            }
            Fz3ij:
            return $WFU8N;
        }
        public function where($i5sHC = '')
        {
            if (!is_array($i5sHC)) {
                goto CuTcY;
            }
            E("\167\150\145\x72\x65\346\x9d\xa1\344\xbb\xb6\xe5\x8f\252\346\x94\257\xe6\x8c\x81\345\xad\227\347\254\xa6\xe4\xb8\262\x21");
            CuTcY:
            $this->where = $i5sHC;
            return $this;
        }
        public function bind($XSw4v = array())
        {
            $this->bind = $XSw4v;
            return $this;
        }
        public function join($yEyy1)
        {
            $aBgTQ = $this->db_prefix;
            $YFmXg = $this->db;
            if (!$aBgTQ) {
                goto oePQa;
            }
            $yEyy1 = explode("\157\x6e", $yEyy1);
            if (!isset($yEyy1[0])) {
                goto ybXup;
            }
            $U2BeL = explode("\152\157\x69\156", $yEyy1[0]);
            if (!isset($U2BeL[1])) {
                goto V0N71;
            }
            $U2BeL[1] = "\40" . $aBgTQ . ltrim($U2BeL[1]);
            V0N71:
            $yEyy1[0] = implode("\x6a\157\151\156", $U2BeL);
            ybXup:
            if (!isset($yEyy1[1])) {
                goto dGpz3;
            }
            $eqg0p = preg_split("\x23\x3d\174\76\174\74\174\x3e\75\174\74\x3d\174\41\75\x23", $yEyy1[1]);
            $eqg0p = array_map(function ($barO2) use($aBgTQ, $YFmXg) {
                $yHerg = explode("\x2e", $barO2);
                $yHerg = $yHerg[0];
                $yHerg = trim($yHerg);
                $bd5s7 = $YFmXg->query("\x53\110\117\x57\x20\x54\x41\x42\x4c\x45\123\x20\x4c\111\x4b\x45\x20\47" . $aBgTQ . $yHerg . "\47");
                $SEbWM = $bd5s7->fetchAll();
                if (!$SEbWM) {
                    goto A0s0U;
                }
                $barO2 = "\x20" . $aBgTQ . ltrim($barO2);
                A0s0U:
                return $barO2;
            }, $eqg0p);
            $yEyy1[1] = implode("\75", $eqg0p);
            dGpz3:
            $yEyy1 = implode("\x6f\x6e", $yEyy1);
            oePQa:
            $this->join = $this->join . "\40" . $yEyy1;
            return $this;
        }
        public function tableid($qpJev = "\164\141\x62\154\145\x69\144")
        {
            $this->tableid = $qpJev;
            return $this;
        }
        public function format($WHnY2 = [])
        {
            $this->format = $WHnY2;
            return $this;
        }
        public function groupby($NyF4O = '')
        {
            $this->groupby = $NyF4O;
            return $this;
        }
        public function having($OXa1Z = '')
        {
            $this->having = $OXa1Z;
            return $this;
        }
        public function orderby($cZoQw = '')
        {
            $this->orderby = $cZoQw;
            return $this;
        }
        public function limit($RW1_U = '')
        {
            $this->limit = $RW1_U;
            return $this;
        }
        public function forupdate()
        {
            $this->forupdate = "\146\157\162\40\165\x70\x64\x61\x74\145";
            return $this;
        }
        public function page($Bb71E = 1, $Q4Uhq = 10, $TKxfo = 10)
        {
            if (!(intval($Q4Uhq) <= 0)) {
                goto Aafdz;
            }
            die("\345\210\206\xe9\xa0\201\346\226\271\xe6\xb3\225\345\x8f\x83\346\x95\270\62\xe5\277\x85\351\xa0\x88\xe7\202\xba\345\xa4\xa7\346\226\274\x30\347\232\x84\xe6\x95\264\xe6\225\xb8");
            Aafdz:
            $Bb71E = intval($Bb71E) == 0 ? 1 : intval($Bb71E);
            $this->currentpage = $Bb71E;
            $this->pagesize = $Q4Uhq;
            $this->pagelen = $TKxfo;
            return $this;
        }
        public function getpage()
        {
            $D2ZlD = $this->pager;
            $this->currentpage = false;
            $this->pagesize = false;
            $this->pagelen = false;
            $this->pager = array();
            return $D2ZlD;
        }
        public function dump()
        {
            $this->isdump = true;
            return $this;
        }
        public function find()
        {
            $this->findone = true;
            $eFnND = $this->findAll();
            $this->findone = false;
            return $eFnND;
        }
        public function linker($Xpk5I)
        {
            $this->linker = $Xpk5I;
            return $this;
        }
        public function linkerbind($TapnB = [])
        {
            $this->linkerbind = $TapnB;
            return $this;
        }
        public function search($Cqk_W = false)
        {
            $this->matchtype = $Cqk_W;
            $this->findone = true;
            $eFnND = $this->findAll();
            $this->findone = false;
            return $eFnND;
        }
        public function searchAll($Cqk_W = false)
        {
            $this->matchtype = $Cqk_W;
            $eFnND = $this->findAll();
            return $eFnND;
        }
        public function getCount()
        {
            $this->iscount = true;
            $this->findone = true;
            $eFnND = $this->findAll();
            $this->iscount = false;
            $this->findone = false;
            return $eFnND;
        }
        public function mmsql($o5ozR = '')
        {
            $eFnND = [];
            $YFmXg = $this->db;
            $XSw4v = $this->bind;
            $xkJ01 = $this->table;
            $i5sHC = $this->where;
            $NyF4O = $this->field;
            if ($this->currentpage) {
                goto CRxYr;
            }
            if ($o5ozR) {
                goto HtLWu;
            }
            E("\350\257\267\350\xbe\x93\345\205\245\163\161\x6c\xe8\xaf\xad\xe5\x8f\xa5\x21");
            HtLWu:
            preg_match_all("\x23\x28\x5c\x77\x2a\51\x28\77\72\x5c\x73\x2b\151\x6e\134\x73\x2a\134\50\x5c\x3f\134\51\x7c\x5c\163\x2b\156\157\x74\134\163\53\151\x6e\x5c\x73\x2a\x5c\50\x5c\77\x5c\x29\51\43", $o5ozR, $lpE3B);
            $MBX6x = $lpE3B[1] ?? [];
            if (!$MBX6x) {
                goto AF7ry;
            }
            foreach ($lpE3B[1] as $vUVC5 => $barO2) {
                preg_match("\x23\x28\151\156\x5c\x73\52\134\50\x5c\77\134\51\174\156\x6f\164\x20\x69\156\134\163\x2a\x5c\50\134\77\134\51\x29\x23\151", $lpE3B[0][$vUVC5], $rcJhr);
                if (!(isset($XSw4v[$barO2]) && isset($rcJhr[1]))) {
                    goto Emwfi;
                }
                if (!is_array($XSw4v[$barO2])) {
                    goto B1_UX;
                }
                $grPNB = array();
                $GHUVw = array();
                foreach ($XSw4v[$barO2] as $BA181 => $g5ERf) {
                    $DEBiK = explode("\56", $barO2);
                    if (isset($DEBiK[1])) {
                        goto xlW3Q;
                    }
                    $m3cM6 = $barO2;
                    goto niFAW;
                    xlW3Q:
                    $m3cM6 = $DEBiK[0] . "\x5f" . $DEBiK[1];
                    niFAW:
                    $DEBiK = explode("\x28", $m3cM6);
                    if (!isset($DEBiK[1])) {
                        goto V_K0v;
                    }
                    $m3cM6 = $DEBiK[0] . "\137" . explode("\54", $DEBiK[1])[0];
                    V_K0v:
                    $grPNB["\72" . $m3cM6 . "\151\156" . $BA181] = $g5ERf;
                    $GHUVw[] = "\x3a" . $m3cM6 . "\x69\156" . $BA181;
                    xy5xP:
                }
                APBO8:
                unset($XSw4v[$barO2]);
                unset($lpE3B[1][$vUVC5]);
                $k03wK = $lpE3B[0][$vUVC5];
                unset($lpE3B[0][$vUVC5]);
                $zYYAq = implode("\x2c", $GHUVw);
                $JVjav = explode("\x3f", $k03wK);
                $JVjav = implode($zYYAq, $JVjav);
                $k03wK = str_replace(["\50", "\x3f", "\x29"], ["\x5c\50", "\x5c\77", "\134\x29"], $k03wK);
                $o5ozR = preg_replace("\43\x5e" . $k03wK . "\x23", $JVjav, $o5ozR);
                $o5ozR = preg_replace("\x23\134\x73\52" . $k03wK . "\x23", "\x20" . $JVjav, $o5ozR);
                $XSw4v = array_merge($XSw4v, $grPNB);
                B1_UX:
                Emwfi:
                n_qWb:
            }
            yTI2Q:
            AF7ry:
            $YAQt_ = explode("\x3f", $o5ozR);
            foreach ($YAQt_ as $h_rAt => $yx0Dy) {
                if (!$yx0Dy) {
                    goto aWaZA;
                }
                if (isset($XSw4v[$h_rAt])) {
                    goto E2j0Z;
                }
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto Govat;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\77";
                Govat:
                goto nY37A;
                E2j0Z:
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto sAYU0;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\x3a\137\164\x6a" . $h_rAt;
                $XSw4v["\72" . "\x5f\x74\x6a" . $h_rAt] = $XSw4v[$h_rAt];
                unset($XSw4v[$h_rAt]);
                sAYU0:
                nY37A:
                aWaZA:
                Rj4FG:
            }
            OFFdp:
            $o5ozR = implode('', $YAQt_);
            if (!(strpos($o5ozR, "\77") !== false)) {
                goto ThgMP;
            }
            E("\351\242\x84\xe5\244\x84\xe7\220\x86\xe5\x8f\202\xe6\225\xb0\xe6\x95\xb0\xe9\207\x8f\344\xb8\215\344\xb8\200\xe8\207\264\x31\63\xef\274\x81");
            ThgMP:
            $ry0T9 = explode("\x3a", $o5ozR);
            $C2oQ2 = false;
            foreach ($XSw4v as $BA181 => $barO2) {
                if (!is_numeric($BA181)) {
                    goto b6ZRp;
                }
                $C2oQ2 = true;
                b6ZRp:
                En2ia:
            }
            eLTFB:
            if (!$C2oQ2) {
                goto KL27J;
            }
            E("\xe9\xa2\204\xe5\xa4\x84\347\x90\206\xe5\x8f\202\xe6\225\260\xe6\225\260\351\x87\x8f\344\xb8\215\344\xb8\200\xe8\x87\xb4\61\x34\xef\xbc\201");
            KL27J:
            if (!$this->isdump) {
                goto uluko;
            }
            print_r($o5ozR);
            echo PHP_EOL;
            print_r($XSw4v);
            die;
            uluko:
            $jyD6n = $YFmXg->prepare($o5ozR);
            $jyD6n->execute($XSw4v);
            $eFnND = $jyD6n->fetchAll(\PDO::FETCH_ASSOC);
            goto bg7XG;
            CRxYr:
            if (!$i5sHC) {
                goto F1rzX;
            }
            preg_match_all("\x23\x28\134\167\52\x29\50\77\x3a\134\163\x2b\x69\156\x5c\163\52\134\50\134\77\134\51\174\x5c\x73\x2b\156\157\x74\x5c\x73\53\x69\x6e\x5c\x73\52\134\50\134\x3f\134\x29\51\43", $i5sHC, $lpE3B);
            $MBX6x = $lpE3B[1] ?? [];
            if (!$MBX6x) {
                goto Rhs3e;
            }
            foreach ($lpE3B[1] as $vUVC5 => $barO2) {
                preg_match("\x23\50\151\156\134\x73\x2a\134\50\x5c\x3f\x5c\x29\x7c\x6e\x6f\x74\x20\x69\x6e\134\163\52\134\x28\134\77\134\51\x29\43\x69", $lpE3B[0][$vUVC5], $rcJhr);
                if (!(isset($XSw4v[$barO2]) && isset($rcJhr[1]))) {
                    goto QppGx;
                }
                if (!is_array($XSw4v[$barO2])) {
                    goto WmpWd;
                }
                $grPNB = array();
                $GHUVw = array();
                foreach ($XSw4v[$barO2] as $BA181 => $g5ERf) {
                    $DEBiK = explode("\56", $barO2);
                    if (isset($DEBiK[1])) {
                        goto eTxl5;
                    }
                    $m3cM6 = $barO2;
                    goto JXc0x;
                    eTxl5:
                    $m3cM6 = $DEBiK[0] . "\137" . $DEBiK[1];
                    JXc0x:
                    $DEBiK = explode("\50", $m3cM6);
                    if (!isset($DEBiK[1])) {
                        goto iDz4S;
                    }
                    $m3cM6 = $DEBiK[0] . "\137" . explode("\x2c", $DEBiK[1])[0];
                    iDz4S:
                    $grPNB["\x3a" . $m3cM6 . "\x69\156" . $BA181] = $g5ERf;
                    $GHUVw[] = "\72" . $m3cM6 . "\x69\x6e" . $BA181;
                    zuWx2:
                }
                BHy5i:
                unset($XSw4v[$barO2]);
                unset($lpE3B[1][$vUVC5]);
                $k03wK = $lpE3B[0][$vUVC5];
                unset($lpE3B[0][$vUVC5]);
                $zYYAq = implode("\x2c", $GHUVw);
                $JVjav = explode("\x3f", $k03wK);
                $JVjav = implode($zYYAq, $JVjav);
                $k03wK = str_replace(["\x28", "\x3f", "\51"], ["\x5c\x28", "\134\x3f", "\134\51"], $k03wK);
                $i5sHC = preg_replace("\43\x5e" . $k03wK . "\43", $JVjav, $i5sHC);
                $i5sHC = preg_replace("\43\x5c\163\x2a" . $k03wK . "\43", "\x20" . $JVjav, $i5sHC);
                $XSw4v = array_merge($XSw4v, $grPNB);
                WmpWd:
                QppGx:
                KnCc_:
            }
            Tth6G:
            Rhs3e:
            $YAQt_ = explode("\x3f", $i5sHC);
            foreach ($YAQt_ as $h_rAt => $yx0Dy) {
                if (!$yx0Dy) {
                    goto eeOdE;
                }
                if (isset($XSw4v[$h_rAt])) {
                    goto uU9sh;
                }
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto GyoXI;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\77";
                GyoXI:
                goto HL4p7;
                uU9sh:
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto b9vYJ;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\x3a\x5f\164\x6a" . $h_rAt;
                $XSw4v["\x3a" . "\x5f\x74\x6a" . $h_rAt] = $XSw4v[$h_rAt];
                unset($XSw4v[$h_rAt]);
                b9vYJ:
                HL4p7:
                eeOdE:
                IC2aM:
            }
            VXHWo:
            $i5sHC = implode('', $YAQt_);
            if (!(strpos($i5sHC, "\77") !== false)) {
                goto jOJCE;
            }
            E("\351\xa2\x84\xe5\xa4\x84\347\220\x86\345\x8f\202\346\225\xb0\xe6\x95\260\351\207\x8f\344\xb8\215\344\270\200\350\207\xb4\x31\63\xef\274\201");
            jOJCE:
            $ry0T9 = explode("\x3a", $i5sHC);
            $C2oQ2 = false;
            foreach ($XSw4v as $BA181 => $barO2) {
                if (!is_numeric($BA181)) {
                    goto FNzIs;
                }
                $C2oQ2 = true;
                FNzIs:
                NtquX:
            }
            Im5yu:
            if (!$C2oQ2) {
                goto ks3W8;
            }
            E("\351\242\204\345\xa4\204\347\220\206\xe5\217\202\346\x95\xb0\xe6\225\260\351\207\217\xe4\270\x8d\xe4\270\x80\350\x87\xb4\x31\64\357\274\201");
            ks3W8:
            $i5sHC = "\167\150\x65\x72\x65\x20" . $i5sHC;
            F1rzX:
            $S9Wpy = "\163\x65\154\145\143\164\x20\143\x6f\x75\156\x74\50\52\x29\x20\x66\162\157\155\40{$xkJ01}\x20{$i5sHC}";
            $mjQwG = "\x73\x65\x6c\x65\143\164\40{$NyF4O}\x20\x66\x72\x6f\x6d\x20{$xkJ01}\x20{$i5sHC}";
            if (!$this->isdump) {
                goto lUIZ6;
            }
            print_r($mjQwG);
            echo PHP_EOL;
            print_r($XSw4v);
            die;
            lUIZ6:
            $jyD6n = $YFmXg->prepare($S9Wpy);
            $jyD6n->execute($XSw4v);
            $JMbs3 = $jyD6n->fetchColumn();
            $SfnGb = $this->currentpage;
            $T3hgP = $this->pagesize;
            $IKIQY = ceil($JMbs3 / $T3hgP);
            $TKxfo = $this->pagelen;
            $JvW97 = intval($TKxfo / 2);
            if ($IKIQY < $TKxfo) {
                goto jypDh;
            }
            if ($SfnGb <= $JvW97) {
                goto oHnio;
            }
            if ($SfnGb + $JvW97 >= $IKIQY) {
                goto N4WYE;
            }
            $xAWsJ = $SfnGb - $JvW97;
            $G3TRP = $SfnGb + $JvW97;
            goto rw0Fx;
            N4WYE:
            $xAWsJ = $IKIQY - $TKxfo + 1;
            $G3TRP = $IKIQY;
            rw0Fx:
            goto roilo;
            oHnio:
            $xAWsJ = 1;
            $G3TRP = $TKxfo;
            roilo:
            goto v18D6;
            jypDh:
            $xAWsJ = 1;
            $G3TRP = $IKIQY;
            v18D6:
            $lJJUq = $SfnGb == 1 ? false : $SfnGb - 1;
            $twcmp = $SfnGb >= $IKIQY ? false : $SfnGb + 1;
            if ($JMbs3) {
                goto Ugauu;
            }
            $D2ZlD = array();
            goto KIYzd;
            Ugauu:
            $D2ZlD = ["\x70\137\x72\157\167\163" => $JMbs3, "\x70\x5f\x73\x69\172\145" => $T3hgP, "\160\x5f\141\x6c\154\x70\141\x67\x65" => $IKIQY, "\160\137\x6e\x6f\167" => $SfnGb, "\x70\137\x66\151\x72\x73\164" => 1, "\x70\x5f\x6c\x61\x73\164" => $IKIQY, "\160\x5f\160\x72\x65\x76" => $lJJUq, "\x70\137\x6e\145\x78\164" => $twcmp, "\160\x5f\x70\141\x67\x65\x73" => range($xAWsJ, $G3TRP)];
            KIYzd:
            $this->pager = $D2ZlD;
            $SUiap = ($SfnGb - 1) * $T3hgP;
            $RW1_U = "\40\154\151\155\x69\164\x20{$SUiap}\x2c{$T3hgP}";
            $SgQ5b = "\x73\145\154\145\x63\164\40{$NyF4O}\x20\x66\x72\157\x6d\x20{$xkJ01}\x20{$i5sHC}\40\x20{$RW1_U}";
            $NxWlv = $YFmXg->prepare($SgQ5b);
            $NxWlv->execute($XSw4v);
            $eFnND = $NxWlv->fetchAll(\PDO::FETCH_ASSOC);
            bg7XG:
            $this->where = '';
            $this->field = "\52";
            $this->bind = array();
            $this->join = null;
            $this->groupby = null;
            $this->having = null;
            $this->orderby = null;
            $this->limit = null;
            $this->forupdate = null;
            $this->findone = false;
            $this->tableid = null;
            $this->table = null;
            $this->format = [];
            $this->currentpage = null;
            $this->pagesize = null;
            $this->pagelen = null;
            $this->data = null;
            $this->rules = null;
            $this->ruleresult = null;
            $this->linker = null;
            $this->linkerbind = [];
            $this->keyword = null;
            $this->keyword_array = [];
            $this->match = null;
            $this->matchtype = null;
            $this->link = [];
            return $eFnND;
        }
        public function findAll()
        {
            $YFmXg = $this->db;
            $xkJ01 = $this->table;
            $i5sHC = $this->where;
            $NyF4O = $this->field;
            $XSw4v = $this->bind;
            $yEyy1 = $this->join;
            $NbQlA = $this->groupby;
            $OXa1Z = $this->having;
            $qMlch = $this->orderby;
            $RW1_U = $this->limit;
            $sM2E7 = $this->forupdate;
            $J8d5b = $this->findone;
            $qpJev = $this->tableid;
            $WHnY2 = $this->format;
            $PpgsF = $this->match;
            $Cqk_W = $this->matchtype;
            $dfvgc = $this->keyword;
            $UMXN8 = $this->keyword_array;
            $Nl_y3 = $this->isdump;
            $R11Zv = $this->iscount;
            if ($xkJ01) {
                goto Vp0hG;
            }
            E("\346\234\252\346\211\xbe\xe5\x88\260\164\x61\142\154\145\xe5\217\x82\xe6\x95\260");
            Vp0hG:
            if (!$i5sHC) {
                goto S3UOK;
            }
            preg_match_all("\43\x28\x5c\167\x2a\51\50\77\72\x5c\163\x2b\151\156\x5c\x73\x2a\x5c\x28\x5c\x3f\x5c\51\x7c\134\163\53\x6e\157\x74\134\x73\53\x69\156\x5c\x73\52\x5c\50\134\x3f\134\51\x29\43", $i5sHC, $lpE3B);
            $MBX6x = $lpE3B[1] ?? [];
            if (!$MBX6x) {
                goto WQKoQ;
            }
            foreach ($lpE3B[1] as $vUVC5 => $barO2) {
                preg_match("\x23\50\151\156\134\x73\x2a\x5c\50\x5c\x3f\x5c\x29\x7c\x6e\157\x74\x20\x69\156\x5c\163\52\134\50\134\77\x5c\x29\x29\x23\x69", $lpE3B[0][$vUVC5], $rcJhr);
                if (!(isset($XSw4v[$barO2]) && isset($rcJhr[1]))) {
                    goto j3vT0;
                }
                if (!is_array($XSw4v[$barO2])) {
                    goto ibiRn;
                }
                $grPNB = array();
                $GHUVw = array();
                foreach ($XSw4v[$barO2] as $BA181 => $g5ERf) {
                    $DEBiK = explode("\56", $barO2);
                    if (isset($DEBiK[1])) {
                        goto yfMoF;
                    }
                    $m3cM6 = $barO2;
                    goto YLAeB;
                    yfMoF:
                    $m3cM6 = $DEBiK[0] . "\137" . $DEBiK[1];
                    YLAeB:
                    $DEBiK = explode("\50", $m3cM6);
                    if (!isset($DEBiK[1])) {
                        goto Skwup;
                    }
                    $m3cM6 = $DEBiK[0] . "\x5f" . explode("\x2c", $DEBiK[1])[0];
                    Skwup:
                    $grPNB["\72" . $m3cM6 . "\151\156" . $BA181] = $g5ERf;
                    $GHUVw[] = "\x3a" . $m3cM6 . "\x69\156" . $BA181;
                    JUdD_:
                }
                C2QGO:
                unset($XSw4v[$barO2]);
                unset($lpE3B[1][$vUVC5]);
                $k03wK = $lpE3B[0][$vUVC5];
                unset($lpE3B[0][$vUVC5]);
                $zYYAq = implode("\x2c", $GHUVw);
                $JVjav = explode("\77", $k03wK);
                $JVjav = implode($zYYAq, $JVjav);
                $k03wK = str_replace(["\x28", "\77", "\x29"], ["\x5c\x28", "\x5c\77", "\x5c\x29"], $k03wK);
                $i5sHC = preg_replace("\43\136" . $k03wK . "\x23", $JVjav, $i5sHC);
                $i5sHC = preg_replace("\43\x5c\x73\x2a" . $k03wK . "\43", "\x20" . $JVjav, $i5sHC);
                $XSw4v = array_merge($XSw4v, $grPNB);
                ibiRn:
                j3vT0:
                jdPMg:
            }
            x6iJt:
            WQKoQ:
            $YAQt_ = explode("\77", $i5sHC);
            foreach ($YAQt_ as $h_rAt => $yx0Dy) {
                if (!$yx0Dy) {
                    goto L9bGe;
                }
                if (isset($XSw4v[$h_rAt])) {
                    goto azywR;
                }
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto EgECp;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\x3f";
                EgECp:
                goto CpLgo;
                azywR:
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto zA1FN;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\x3a\x5f\x74\152" . $h_rAt;
                $XSw4v["\x3a" . "\137\164\x6a" . $h_rAt] = $XSw4v[$h_rAt];
                unset($XSw4v[$h_rAt]);
                zA1FN:
                CpLgo:
                L9bGe:
                bMGML:
            }
            TzH6x:
            $i5sHC = implode('', $YAQt_);
            if (!(strpos($i5sHC, "\x3f") !== false)) {
                goto r9JSq;
            }
            E("\xe9\242\x84\xe5\xa4\x84\347\x90\206\xe5\217\x82\346\x95\260\346\225\260\351\207\x8f\xe4\xb8\215\xe4\xb8\200\350\207\264\61\x33\357\xbc\201");
            r9JSq:
            $ry0T9 = explode("\x3a", $i5sHC);
            $C2oQ2 = false;
            foreach ($XSw4v as $BA181 => $barO2) {
                if (!is_numeric($BA181)) {
                    goto zLpJh;
                }
                $C2oQ2 = true;
                zLpJh:
                vC9sQ:
            }
            JmhpC:
            if (!$C2oQ2) {
                goto quzvU;
            }
            E("\351\xa2\204\345\xa4\x84\347\220\x86\xe5\x8f\202\xe6\x95\xb0\xe6\x95\260\xe9\207\217\344\xb8\215\xe4\xb8\x80\xe8\207\264\x31\64\xef\xbc\201");
            quzvU:
            $i5sHC = "\167\150\145\162\145\40" . $i5sHC;
            S3UOK:
            if ($dfvgc && $PpgsF) {
                goto APmZd;
            }
            if (!$UMXN8) {
                goto oEPfD;
            }
            if (!$Cqk_W) {
                goto kpdf0;
            }
            $Wc1rz = "\x49\116\x20\116\x41\x54\x55\x52\x41\114\40\114\x41\x4e\107\x55\x41\x47\105\40\115\117\104\105";
            goto hww2W;
            kpdf0:
            $Wc1rz = "\111\116\40\x42\x4f\x4f\114\105\x41\116\40\115\x4f\104\x45";
            hww2W:
            $gsYlg = [];
            foreach ($UMXN8 as $vUVC5 => $barO2) {
                if (!($barO2 || is_numeric($barO2))) {
                    goto ftH43;
                }
                $XSw4v["\x3a\153\x65\171\167\157\x72\x64\137" . $vUVC5] = $barO2;
                $gsYlg[] = "\x4d\101\x54\103\110\x20\x28{$vUVC5}\x29\x20\x41\107\x41\x49\116\123\x54\40\50\x3a\153\x65\x79\x77\x6f\162\x64\137{$vUVC5}\x20{$Wc1rz}\x29";
                ftH43:
                LHU02:
            }
            jkYtt:
            if ($gsYlg) {
                goto HPZwB;
            }
            return [];
            $this->where = '';
            $this->field = "\x2a";
            $this->bind = array();
            $this->join = null;
            $this->groupby = null;
            $this->having = null;
            $this->orderby = null;
            $this->limit = null;
            $this->forupdate = null;
            $this->findone = false;
            $this->tableid = null;
            $this->table = null;
            $this->format = [];
            $this->currentpage = null;
            $this->pagesize = null;
            $this->pagelen = null;
            $this->data = null;
            $this->rules = null;
            $this->ruleresult = null;
            $this->linker = null;
            $this->linkerbind = [];
            $this->keyword = null;
            $this->keyword_array = [];
            $this->match = null;
            $this->matchtype = null;
            $this->link = [];
            HPZwB:
            $gsYlg = join("\40\141\x6e\144\x20", $gsYlg);
            if ($i5sHC) {
                goto Aq2eI;
            }
            $i5sHC = "\167\x68\145\162\145\x20" . $gsYlg;
            goto v81kQ;
            Aq2eI:
            $i5sHC = $i5sHC . "\x20\141\156\x64\40" . $gsYlg;
            v81kQ:
            oEPfD:
            goto bgR2O;
            APmZd:
            if (!$Cqk_W) {
                goto KshIO;
            }
            $XSw4v["\72\153\145\171\167\x6f\162\x64"] = $dfvgc;
            $Wc1rz = "\111\116\x20\116\x41\x54\x55\122\101\x4c\x20\x4c\101\x4e\107\125\101\x47\105\40\115\x4f\104\105";
            goto Hw72L;
            KshIO:
            $XSw4v["\72\153\x65\171\167\x6f\x72\144"] = $dfvgc;
            $Wc1rz = "\111\x4e\x20\x42\117\117\x4c\x45\101\116\40\x4d\x4f\x44\105";
            Hw72L:
            if ($i5sHC) {
                goto DW0qP;
            }
            $i5sHC = "\x77\x68\145\162\x65\40\40\115\x41\124\x43\x48\40\x28{$PpgsF}\x29\40\x41\107\x41\x49\x4e\x53\x54\x20\x28\x3a\153\x65\x79\167\157\162\144\40{$Wc1rz}\51";
            goto KK6Rg;
            DW0qP:
            $i5sHC = $i5sHC . "\40\101\116\x44\40\40\x4d\101\124\x43\110\40\x28{$PpgsF}\x29\40\x41\x47\101\x49\x4e\123\124\x20\50\72\153\145\171\167\x6f\162\144\40{$Wc1rz}\x29";
            KK6Rg:
            bgR2O:
            if (!$NbQlA) {
                goto FFmGt;
            }
            if (!($NyF4O == "\x2a")) {
                goto fr1YP;
            }
            E("\x67\x72\157\x75\x70\142\x79\xe5\210\x86\xe7\273\204\346\237\245\350\xaf\242\351\x9c\200\350\246\201\xe6\211\213\xe5\212\xa8\351\205\215\347\xbd\256\146\x69\145\x6c\144\xe6\x96\271\346\xb3\225\345\x8f\x82\346\225\xb0");
            fr1YP:
            $NbQlA = "\147\x72\157\165\160\40\x62\x79\40" . $NbQlA;
            FFmGt:
            if (!$OXa1Z) {
                goto B0TNS;
            }
            if ($NbQlA) {
                goto kmtIo;
            }
            E("\150\141\166\x69\156\x67\346\x98\xaf\xe5\x88\x86\347\273\204\346\x9f\xa5\350\xaf\xa2\345\220\x8e\347\232\204\xe6\x9d\241\xe4\273\xb6\xe8\257\255\345\217\xa5\357\274\214\xe8\257\267\351\205\x8d\xe7\275\256\147\162\157\x75\x70\x62\171\345\210\206\xe7\xbb\x84\346\x9f\xa5\350\xaf\242\xe6\x96\271\346\263\x95");
            kmtIo:
            $OXa1Z = "\x68\x61\x76\x69\156\x67\x20" . $OXa1Z;
            B0TNS:
            if (!$qMlch) {
                goto aTWUG;
            }
            $qMlch = "\157\x72\144\145\162\x20\142\x79\x20" . $qMlch;
            $qMlch = strtolower($qMlch);
            aTWUG:
            if (!$RW1_U) {
                goto Q5wvS;
            }
            $RW1_U = "\154\151\x6d\151\x74\x20" . $RW1_U;
            Q5wvS:
            $WFU8N = $this->primary($xkJ01);
            $VLADl = explode("\x20\141\163\40", $xkJ01);
            if (isset($VLADl[1])) {
                goto N5Xmy;
            }
            $VLADl = $xkJ01;
            goto Nef1a;
            N5Xmy:
            $VLADl = $VLADl[1];
            Nef1a:
            if (!$WFU8N) {
                goto JJ71L;
            }
            $xgQ3U = explode("\54", $NyF4O);
            if (!(array_search($WFU8N, $xgQ3U) !== false)) {
                goto WOqH7;
            }
            $xgQ3U[array_search($WFU8N, $xgQ3U)] = $VLADl . "\x2e" . $WFU8N;
            WOqH7:
            $NyF4O = implode("\54", $xgQ3U);
            JJ71L:
            if ($J8d5b) {
                goto m0Ne3;
            }
            if (!$this->currentpage) {
                goto YFEAP;
            }
            if (!$Nl_y3) {
                goto iNLaT;
            }
            echo "\xe5\210\206\xe9\xa1\265\346\237\xa5\350\257\xa2\346\xb6\x89\345\217\212\345\x88\260\346\xa0\270\345\xbf\203\350\x87\xaa\345\212\xa8\350\275\xac\346\x8d\xa2\350\xaf\255\345\x8f\xa5\xef\274\x8c\xe5\217\xaa\xe6\230\xbe\347\xa4\272\xe7\224\xa8\346\x88\xb7\350\xbe\x93\xe5\x85\245\xe7\232\x84\350\xaf\255\xe5\217\245\xef\xbc\201" . PHP_EOL;
            $mjQwG = "\x73\145\x6c\145\143\164\40{$NyF4O}\x20\146\162\157\155\40{$xkJ01}\40{$yEyy1}\x20{$i5sHC}\x20{$NbQlA}\x20{$OXa1Z}\40{$qMlch}";
            print_r($mjQwG);
            echo PHP_EOL;
            print_r($XSw4v);
            die;
            iNLaT:
            $S9Wpy = "\x73\x65\x6c\145\143\164\x20\x63\157\x75\x6e\x74\50\52\51\40\x66\162\157\x6d\40{$xkJ01}\40{$yEyy1}\x20{$i5sHC}";
            $jyD6n = $YFmXg->prepare($S9Wpy);
            $jyD6n->execute($XSw4v);
            $JMbs3 = $jyD6n->fetchColumn();
            $SfnGb = $this->currentpage;
            $T3hgP = $this->pagesize;
            $IKIQY = ceil($JMbs3 / $T3hgP);
            $TKxfo = $this->pagelen;
            $JvW97 = intval($TKxfo / 2);
            if ($IKIQY < $TKxfo) {
                goto kf1Xd;
            }
            if ($SfnGb <= $JvW97) {
                goto O4QdB;
            }
            if ($SfnGb + $JvW97 >= $IKIQY) {
                goto vo8Yn;
            }
            $xAWsJ = $SfnGb - $JvW97;
            $G3TRP = $SfnGb + $JvW97;
            goto GXChi;
            vo8Yn:
            $xAWsJ = $IKIQY - $TKxfo + 1;
            $G3TRP = $IKIQY;
            GXChi:
            goto E7rt_;
            O4QdB:
            $xAWsJ = 1;
            $G3TRP = $TKxfo;
            E7rt_:
            goto TAcua;
            kf1Xd:
            $xAWsJ = 1;
            $G3TRP = $IKIQY;
            TAcua:
            $lJJUq = $SfnGb == 1 ? false : $SfnGb - 1;
            $twcmp = $SfnGb >= $IKIQY ? false : $SfnGb + 1;
            if ($JMbs3) {
                goto dC0Xc;
            }
            $D2ZlD = array();
            goto j6Cz4;
            dC0Xc:
            $D2ZlD = ["\160\x5f\x72\157\167\163" => $JMbs3, "\160\137\x73\151\172\145" => $T3hgP, "\160\x5f\x61\x6c\x6c\x70\x61\x67\145" => $IKIQY, "\x70\x5f\156\157\x77" => $SfnGb, "\160\137\x66\151\162\x73\x74" => 1, "\160\137\x6c\141\x73\164" => $IKIQY, "\x70\x5f\x70\x72\145\166" => $lJJUq, "\160\137\156\x65\170\164" => $twcmp, "\x70\137\x70\141\x67\145\163" => range($xAWsJ, $G3TRP)];
            j6Cz4:
            $this->pager = $D2ZlD;
            $SUiap = ($SfnGb - 1) * $T3hgP;
            $RW1_U = "\x20\154\x69\155\151\x74\x20{$SUiap}\54{$T3hgP}";
            $SgQ5b = "\163\x65\154\145\x63\x74\x20{$NyF4O}\x20\x66\162\x6f\155\x20{$xkJ01}\x20{$yEyy1}\40{$i5sHC}\40{$qMlch}\40{$RW1_U}";
            $NxWlv = $YFmXg->prepare($SgQ5b);
            $NxWlv->execute($XSw4v);
            $eFnND = $NxWlv->fetchAll(\PDO::FETCH_ASSOC);
            if ($eFnND) {
                goto YH1Xg;
            }
            $eFnND = [];
            goto nuSqd;
            YH1Xg:
            $Xpk5I = $this->linker;
            if (!$Xpk5I) {
                goto b328N;
            }
            if (is_bool($Xpk5I)) {
                goto eHmVP;
            }
            if (is_string($Xpk5I)) {
                goto PDkJj;
            }
            if (is_array($Xpk5I)) {
                goto oPb9c;
            }
            goto yo8Ev;
            eHmVP:
            E("\154\151\156\153\x65\x72\344\xb8\255\xe9\x97\xb4\xe6\226\xb9\346\xb3\225\xe4\xb8\x8d\346\224\257\346\214\x81\x62\x6f\x6f\x6c\344\xbc\240\345\217\x82");
            goto yo8Ev;
            PDkJj:
            $Xpk5I = explode("\x2c", $Xpk5I);
            $QRL0z = $this->link;
            $T_qYT = array();
            foreach ($QRL0z as $barO2) {
                if (!in_array($barO2["\x6d\141\160"], $Xpk5I)) {
                    goto DmH6z;
                }
                $T_qYT[] = $barO2;
                DmH6z:
                VbLKq:
            }
            b1goU:
            goto yo8Ev;
            oPb9c:
            $QRL0z = $this->link;
            $T_qYT = array();
            foreach ($QRL0z as $barO2) {
                if (!in_array($barO2["\x6d\x61\x70"], $Xpk5I)) {
                    goto sx9Jv;
                }
                $T_qYT[] = $barO2;
                sx9Jv:
                C_Ldc:
            }
            rn3Q2:
            yo8Ev:
            if (!$eFnND) {
                goto R_7dT;
            }
            if (!(count($T_qYT) > 0)) {
                goto pvd22;
            }
            $eFnND = $this->linkfind($eFnND, $T_qYT, $xkJ01, false);
            pvd22:
            R_7dT:
            b328N:
            foreach ($eFnND as $vUVC5 => $barO2) {
                if (!($qpJev && count($eFnND) > 0)) {
                    goto Ox7Ns;
                }
                $eFnND[$vUVC5][$qpJev] = $vUVC5 + 1 + ($SfnGb - 1) * $T3hgP;
                Ox7Ns:
                if (!(count($WHnY2) > 0)) {
                    goto IiANM;
                }
                foreach ($WHnY2 as $CiDyp => $g10C3) {
                    if (!isset($barO2[$CiDyp])) {
                        goto Vuim8;
                    }
                    $u77Jk = $barO2[$CiDyp];
                    $vjGds = $u77Jk;
                    if (!isset($g10C3["\x66\157\162\x6d\141\x74"])) {
                        goto VjBwi;
                    }
                    $T0S4L = $g10C3["\146\157\162\x6d\x61\x74"];
                    if (is_array($T0S4L)) {
                        goto A3Vxe;
                    }
                    $T0S4L = explode("\x7c", $g10C3["\146\x6f\x72\155\141\164"]);
                    if ($T0S4L[0] == "\144\141\x74\145" && isset($T0S4L[1])) {
                        goto pxVVh;
                    }
                    if ($T0S4L[0] == "\163\x61\x66\x65" && isset($T0S4L[1])) {
                        goto GdmM1;
                    }
                    if (!($T0S4L[0] == "\x72\145\160\x6c\x61\143\145" && isset($T0S4L[1]))) {
                        goto AoWny;
                    }
                    $UBX_h = explode("\54", $T0S4L[1]);
                    if (!(isset($UBX_h[0]) && isset($UBX_h[1]))) {
                        goto hMQ1c;
                    }
                    $vjGds = str_replace($UBX_h[0], $UBX_h[1], $u77Jk);
                    hMQ1c:
                    AoWny:
                    goto b3ph2;
                    GdmM1:
                    $ZjjYt = $this->cn_strlen($u77Jk) - 1;
                    $hbgJq = explode("\x2c", $T0S4L[1]);
                    if (!(isset($hbgJq[0]) && isset($hbgJq[1]))) {
                        goto s04bi;
                    }
                    if (!($hbgJq[0] < $ZjjYt)) {
                        goto Fzsat;
                    }
                    $bwdB4 = mb_substr($u77Jk, $hbgJq[0], $hbgJq[1], "\165\x74\x66\x2d\70");
                    $jX3VY = $this->cn_strlen($bwdB4);
                    if (!($hbgJq[1] < $jX3VY)) {
                        goto xf5G0;
                    }
                    $jX3VY = $hbgJq[1];
                    xf5G0:
                    $k04l6 = $hbgJq[2] ?? "\52";
                    $BRmQz = $k04l6;
                    $QHnw0 = 1;
                    ih1jU:
                    if (!($QHnw0 < $jX3VY)) {
                        goto hmHSK;
                    }
                    $BRmQz .= $k04l6;
                    JiiQK:
                    $QHnw0++;
                    goto ih1jU;
                    hmHSK:
                    $vjGds = str_replace($bwdB4, $BRmQz, $u77Jk);
                    Fzsat:
                    s04bi:
                    b3ph2:
                    goto Kku2c;
                    pxVVh:
                    if ($u77Jk > 0) {
                        goto aUZ64;
                    }
                    $vjGds = '';
                    goto iTctH;
                    aUZ64:
                    $vjGds = date($T0S4L[1], $u77Jk);
                    iTctH:
                    Kku2c:
                    if (isset($g10C3["\x6e\x65\167\146\151\145\x6c\x64"]) && $g10C3["\156\x65\x77\146\x69\145\154\x64"]) {
                        goto RG32A;
                    }
                    $eFnND[$vUVC5][$CiDyp] = $vjGds;
                    goto dTZHw;
                    RG32A:
                    $eFnND[$vUVC5][$g10C3["\156\x65\167\x66\x69\145\154\x64"]] = $vjGds;
                    dTZHw:
                    goto QL4xe;
                    A3Vxe:
                    if (!isset($T0S4L[$u77Jk])) {
                        goto r899y;
                    }
                    $vjGds = $T0S4L[$u77Jk];
                    r899y:
                    if (isset($g10C3["\x6e\145\x77\146\151\145\x6c\144"]) && $g10C3["\x6e\145\167\146\x69\x65\154\144"]) {
                        goto iC2Kj;
                    }
                    $eFnND[$vUVC5][$CiDyp] = $vjGds;
                    goto EP6Wk;
                    iC2Kj:
                    $eFnND[$vUVC5][$g10C3["\156\x65\167\x66\151\145\x6c\x64"]] = $vjGds;
                    EP6Wk:
                    QL4xe:
                    VjBwi:
                    Vuim8:
                    rcurQ:
                }
                z2EFR:
                IiANM:
                IBmgE:
            }
            cJpZu:
            nuSqd:
            $this->where = '';
            $this->field = "\x2a";
            $this->bind = array();
            $this->join = null;
            $this->groupby = null;
            $this->having = null;
            $this->orderby = null;
            $this->limit = null;
            $this->forupdate = null;
            $this->findone = false;
            $this->tableid = null;
            $this->table = null;
            $this->format = [];
            $this->data = null;
            $this->rules = null;
            $this->ruleresult = null;
            $this->linker = null;
            $this->linkerbind = [];
            $this->keyword = null;
            $this->keyword_array = [];
            $this->match = null;
            $this->matchtype = null;
            $this->link = null;
            return $eFnND;
            YFEAP:
            $o5ozR = "\x73\x65\154\x65\143\164\x20{$NyF4O}\x20\x66\162\x6f\x6d\40{$xkJ01}\x20{$yEyy1}\x20{$i5sHC}\40{$NbQlA}\x20{$OXa1Z}\x20{$qMlch}\x20{$RW1_U}";
            goto geKRS;
            m0Ne3:
            $RW1_U = "\x6c\x69\155\151\164\40\60\54\x31";
            if ($R11Zv) {
                goto IerVF;
            }
            $o5ozR = "\163\145\x6c\x65\x63\164\40{$NyF4O}\40\146\x72\157\155\40{$xkJ01}\x20{$yEyy1}\x20{$i5sHC}\x20{$NbQlA}\x20{$OXa1Z}\x20{$qMlch}\x20{$RW1_U}\x20{$sM2E7}";
            goto f0c9f;
            IerVF:
            $o5ozR = "\163\x65\154\145\x63\164\x20\143\157\x75\156\x74\x28\x2a\51\40\x61\163\x20\x6d\x69\155\151\x63\x6f\165\x6e\x74\40\146\162\157\x6d\40{$xkJ01}\x20{$i5sHC}";
            f0c9f:
            geKRS:
            if (!$Nl_y3) {
                goto ZWEx4;
            }
            echo $o5ozR . PHP_EOL;
            print_r($XSw4v);
            die;
            ZWEx4:
            $jyD6n = $YFmXg->prepare($o5ozR);
            $jyD6n->execute($XSw4v);
            if ($J8d5b) {
                goto apCLv;
            }
            $eFnND = $jyD6n->fetchAll(\PDO::FETCH_ASSOC);
            goto SUXae;
            apCLv:
            $eFnND = $jyD6n->fetch(\PDO::FETCH_ASSOC);
            if (!$R11Zv) {
                goto bRwip;
            }
            $eFnND = $eFnND["\x6d\151\155\x69\143\x6f\x75\x6e\x74"];
            bRwip:
            SUXae:
            if ($R11Zv) {
                goto mLOe6;
            }
            $Xpk5I = $this->linker;
            if (!$Xpk5I) {
                goto vhkCC;
            }
            if (is_bool($Xpk5I)) {
                goto S3R26;
            }
            if (is_string($Xpk5I)) {
                goto Y9uEX;
            }
            if (is_array($Xpk5I)) {
                goto do2tM;
            }
            goto UW2Z3;
            S3R26:
            E("\x6c\x69\x6e\153\x65\162\xe4\xb8\255\xe9\227\264\346\x96\271\xe6\263\x95\344\270\215\xe6\x94\257\346\214\x81\142\x6f\157\154\344\274\240\xe5\217\x82");
            goto UW2Z3;
            Y9uEX:
            $Xpk5I = explode("\54", $Xpk5I);
            $QRL0z = $this->link;
            $T_qYT = array();
            foreach ($QRL0z as $barO2) {
                if (!in_array($barO2["\x6d\141\160"], $Xpk5I)) {
                    goto G7y6b;
                }
                $T_qYT[] = $barO2;
                G7y6b:
                k8xY9:
            }
            lIuV1:
            goto UW2Z3;
            do2tM:
            $QRL0z = $this->link;
            $T_qYT = array();
            foreach ($QRL0z as $barO2) {
                if (!in_array($barO2["\155\141\x70"], $Xpk5I)) {
                    goto LTfaK;
                }
                $T_qYT[] = $barO2;
                LTfaK:
                Yd_9B:
            }
            YDnWX:
            UW2Z3:
            if (!$eFnND) {
                goto Xbrb2;
            }
            $eFnND = $this->linkfind($eFnND, $T_qYT, $xkJ01, false);
            Xbrb2:
            vhkCC:
            if ($J8d5b) {
                goto d5heX;
            }
            if (!(is_array($eFnND) && count($eFnND) > 0)) {
                goto NOtNi;
            }
            foreach ($eFnND as $vUVC5 => $barO2) {
                if (!(count($WHnY2) > 0)) {
                    goto vO534;
                }
                foreach ($WHnY2 as $CiDyp => $g10C3) {
                    if (!isset($barO2[$CiDyp])) {
                        goto uIQbS;
                    }
                    $u77Jk = $barO2[$CiDyp];
                    $vjGds = $u77Jk;
                    if (!isset($g10C3["\146\157\162\x6d\141\164"])) {
                        goto wf3Nx;
                    }
                    $T0S4L = $g10C3["\146\157\162\x6d\141\164"];
                    if (is_array($T0S4L)) {
                        goto tClvJ;
                    }
                    $T0S4L = explode("\x7c", $g10C3["\x66\157\162\x6d\x61\x74"]);
                    if ($T0S4L[0] == "\144\141\164\x65" && isset($T0S4L[1])) {
                        goto k0p88;
                    }
                    if ($T0S4L[0] == "\163\141\146\145" && isset($T0S4L[1])) {
                        goto gCsPJ;
                    }
                    if (!($T0S4L[0] == "\162\145\160\154\141\143\145" && isset($T0S4L[1]))) {
                        goto qg4qu;
                    }
                    $UBX_h = explode("\54", $T0S4L[1]);
                    if (!(isset($UBX_h[0]) && isset($UBX_h[1]))) {
                        goto pqzEI;
                    }
                    $vjGds = str_replace($UBX_h[0], $UBX_h[1], $u77Jk);
                    pqzEI:
                    qg4qu:
                    goto jySV1;
                    gCsPJ:
                    $ZjjYt = $this->cn_strlen($u77Jk) - 1;
                    $hbgJq = explode("\54", $T0S4L[1]);
                    if (!(isset($hbgJq[0]) && isset($hbgJq[1]))) {
                        goto hqiGa;
                    }
                    if (!($hbgJq[0] < $ZjjYt)) {
                        goto EzKQE;
                    }
                    $bwdB4 = mb_substr($u77Jk, $hbgJq[0], $hbgJq[1], "\x75\x74\x66\x2d\70");
                    $jX3VY = $this->cn_strlen($bwdB4);
                    if (!($hbgJq[1] < $jX3VY)) {
                        goto yXJ6h;
                    }
                    $jX3VY = $hbgJq[1];
                    yXJ6h:
                    $k04l6 = $hbgJq[2] ?? "\52";
                    $BRmQz = $k04l6;
                    $QHnw0 = 1;
                    vAtTs:
                    if (!($QHnw0 < $jX3VY)) {
                        goto bjhGX;
                    }
                    $BRmQz .= $k04l6;
                    KZDmf:
                    $QHnw0++;
                    goto vAtTs;
                    bjhGX:
                    $vjGds = str_replace($bwdB4, $BRmQz, $u77Jk);
                    EzKQE:
                    hqiGa:
                    jySV1:
                    goto Aylu4;
                    k0p88:
                    if ($u77Jk > 0) {
                        goto BbdFB;
                    }
                    $vjGds = '';
                    goto cwEua;
                    BbdFB:
                    $vjGds = date($T0S4L[1], $u77Jk);
                    cwEua:
                    Aylu4:
                    if (isset($g10C3["\156\145\167\x66\151\x65\x6c\x64"]) && $g10C3["\156\x65\x77\146\151\145\154\x64"]) {
                        goto GtnG5;
                    }
                    $eFnND[$vUVC5][$CiDyp] = $vjGds;
                    goto QJJv3;
                    GtnG5:
                    $eFnND[$vUVC5][$g10C3["\x6e\145\167\146\x69\145\x6c\x64"]] = $vjGds;
                    QJJv3:
                    goto FvEIc;
                    tClvJ:
                    if (!isset($T0S4L[$u77Jk])) {
                        goto IHyAv;
                    }
                    $vjGds = $T0S4L[$u77Jk];
                    IHyAv:
                    if (isset($g10C3["\156\145\x77\x66\x69\145\x6c\x64"]) && $g10C3["\x6e\x65\167\146\151\145\154\x64"]) {
                        goto x0oIP;
                    }
                    $eFnND[$vUVC5][$CiDyp] = $vjGds;
                    goto shDCc;
                    x0oIP:
                    $eFnND[$vUVC5][$g10C3["\156\x65\x77\x66\x69\x65\154\x64"]] = $vjGds;
                    shDCc:
                    FvEIc:
                    wf3Nx:
                    uIQbS:
                    yFzLS:
                }
                RzLym:
                vO534:
                EkqHD:
            }
            sd28_:
            NOtNi:
            goto v2ht2;
            d5heX:
            if (!(count($WHnY2) > 0)) {
                goto ST2WF;
            }
            foreach ($WHnY2 as $CiDyp => $g10C3) {
                if (!isset($eFnND[$CiDyp])) {
                    goto qO_CS;
                }
                $u77Jk = $eFnND[$CiDyp];
                $vjGds = $u77Jk;
                if (!isset($g10C3["\x66\157\x72\x6d\141\164"])) {
                    goto Imipd;
                }
                $T0S4L = $g10C3["\146\157\x72\x6d\x61\x74"];
                if (is_array($T0S4L)) {
                    goto RaIl1;
                }
                $T0S4L = explode("\174", $g10C3["\146\x6f\162\155\141\164"]);
                if ($T0S4L[0] == "\x64\141\164\145" && isset($T0S4L[1])) {
                    goto gwe4G;
                }
                if ($T0S4L[0] == "\163\141\x66\x65" && isset($T0S4L[1])) {
                    goto ihOQQ;
                }
                if (!($T0S4L[0] == "\x72\x65\160\154\141\x63\x65" && isset($T0S4L[1]))) {
                    goto Dvjhy;
                }
                $UBX_h = explode("\54", $T0S4L[1]);
                if (!(isset($UBX_h[0]) && isset($UBX_h[1]))) {
                    goto WYTjA;
                }
                $vjGds = str_replace($UBX_h[0], $UBX_h[1], $u77Jk);
                WYTjA:
                Dvjhy:
                goto mCmg8;
                ihOQQ:
                $ZjjYt = $this->cn_strlen($u77Jk) - 1;
                $hbgJq = explode("\x2c", $T0S4L[1]);
                if (!(isset($hbgJq[0]) && isset($hbgJq[1]))) {
                    goto WeMyK;
                }
                if (!($hbgJq[0] < $ZjjYt)) {
                    goto V_k_j;
                }
                $bwdB4 = mb_substr($u77Jk, $hbgJq[0], $hbgJq[1], "\x75\x74\146\55\x38");
                $jX3VY = $this->cn_strlen($bwdB4);
                if (!($hbgJq[1] < $jX3VY)) {
                    goto R3WP_;
                }
                $jX3VY = $hbgJq[1];
                R3WP_:
                $k04l6 = $hbgJq[2] ?? "\52";
                $BRmQz = $k04l6;
                $QHnw0 = 1;
                RGMIb:
                if (!($QHnw0 < $jX3VY)) {
                    goto HlBPs;
                }
                $BRmQz .= $k04l6;
                x2Jjw:
                $QHnw0++;
                goto RGMIb;
                HlBPs:
                $vjGds = str_replace($bwdB4, $BRmQz, $u77Jk);
                V_k_j:
                WeMyK:
                mCmg8:
                goto Skh5O;
                gwe4G:
                if ($u77Jk > 0) {
                    goto qjGuq;
                }
                $vjGds = '';
                goto RySDJ;
                qjGuq:
                $vjGds = date($T0S4L[1], $u77Jk);
                RySDJ:
                Skh5O:
                if (isset($g10C3["\x6e\x65\167\x66\x69\145\154\x64"]) && $g10C3["\156\x65\167\146\151\145\x6c\144"]) {
                    goto rPVui;
                }
                $eFnND[$CiDyp] = $vjGds;
                goto IyS0J;
                rPVui:
                $eFnND[$g10C3["\x6e\145\167\x66\151\145\x6c\x64"]] = $vjGds;
                IyS0J:
                goto M5xTy;
                RaIl1:
                if (!isset($T0S4L[$u77Jk])) {
                    goto h_Fv6;
                }
                $vjGds = $T0S4L[$u77Jk];
                h_Fv6:
                if (isset($g10C3["\156\145\167\x66\x69\145\154\144"]) && $g10C3["\x6e\145\x77\146\x69\x65\154\144"]) {
                    goto nKXFf;
                }
                $eFnND[$CiDyp] = $vjGds;
                goto NqntJ;
                nKXFf:
                $eFnND[$g10C3["\156\145\167\x66\151\145\154\144"]] = $vjGds;
                NqntJ:
                M5xTy:
                Imipd:
                qO_CS:
                Vdg62:
            }
            sG9v8:
            ST2WF:
            v2ht2:
            mLOe6:
            $this->where = '';
            $this->field = "\x2a";
            $this->bind = array();
            $this->join = null;
            $this->groupby = null;
            $this->having = null;
            $this->orderby = null;
            $this->limit = null;
            $this->forupdate = null;
            $this->findone = false;
            $this->tableid = null;
            $this->table = null;
            $this->format = [];
            $this->currentpage = null;
            $this->pagesize = null;
            $this->pagelen = null;
            $this->data = null;
            $this->rules = null;
            $this->ruleresult = null;
            $this->linker = null;
            $this->linkerbind = [];
            $this->keyword = null;
            $this->keyword_array = [];
            $this->match = null;
            $this->matchtype = null;
            $this->link = [];
            return $eFnND;
        }
        private function linkfind(&$eFnND, $T_qYT, $xkJ01, $IwKvJ = false)
        {
            $YFmXg = $this->db;
            $aBgTQ = $this->db_prefix;
            $J8d5b = $this->findone;
            if (!$IwKvJ) {
                goto Up_oj;
            }
            if (array_depth($eFnND) == 1) {
                goto hiT8F;
            }
            $J8d5b = false;
            goto kyCfD;
            hiT8F:
            $J8d5b = true;
            kyCfD:
            Up_oj:
            foreach ($T_qYT as $nE20_) {
                $iH31H = $nE20_["\164\x79\160\x65"];
                $DYs2P = $nE20_["\x6d\x61\160"];
                $DCnvr = explode("\54", $nE20_["\x6d\x6b\145\171"]);
                $vkzsN = $aBgTQ . $nE20_["\146\x74\x61\142\x6c\145"];
                $slcN6 = explode("\54", $nE20_["\x66\153\145\x79"]);
                $cZoQw = isset($nE20_["\x6f\x72\x64\x65\x72"]) ? $nE20_["\x6f\162\144\145\x72"] : '';
                if (!$cZoQw) {
                    goto t_BBy;
                }
                $cZoQw = "\x6f\162\x64\x65\x72\x20\x62\171\40" . $cZoQw;
                t_BBy:
                $i5sHC = isset($nE20_["\167\x68\145\162\x65"]) ? $nE20_["\167\x68\145\162\145"] : '';
                $XSw4v = isset($nE20_["\142\151\156\144"]) ? $nE20_["\142\151\x6e\144"] : '';
                $TapnB = $this->linkerbind;
                if (!$i5sHC) {
                    goto Z9XWg;
                }
                $i5sHC = "\141\x6e\x64\40" . $i5sHC;
                if (!$XSw4v) {
                    goto A3iIi;
                }
                $J0XeG = array_keys($TapnB);
                foreach ($XSw4v as $BA181 => $g5ERf) {
                    if (!in_array($g5ERf, $J0XeG)) {
                        goto bHyJP;
                    }
                    if (is_array($TapnB[$g5ERf])) {
                        goto LkxfE;
                    }
                    $XSw4v[$BA181] = $TapnB[$g5ERf];
                    goto Yfs0d;
                    LkxfE:
                    $XSw4v[$g5ERf] = $TapnB[$g5ERf];
                    unset($XSw4v[$BA181]);
                    Yfs0d:
                    bHyJP:
                    hZPOg:
                }
                CyKui:
                preg_match_all("\43\x28\x5c\167\52\51\50\x3f\72\x5c\163\x2b\x69\x6e\134\x73\52\134\x28\x5c\x3f\134\x29\x7c\x5c\163\53\x6e\x6f\x74\134\163\53\x69\x6e\x5c\x73\52\x5c\x28\x5c\x3f\x5c\51\x29\x23", $i5sHC, $lpE3B);
                $MBX6x = $lpE3B[1] ?? [];
                if (!$MBX6x) {
                    goto wLSN0;
                }
                foreach ($lpE3B[1] as $vUVC5 => $barO2) {
                    preg_match("\x23\50\151\x6e\x5c\163\52\134\50\134\77\134\51\174\156\157\x74\x20\151\156\x5c\163\52\134\x28\x5c\x3f\134\51\x29\43\151", $lpE3B[0][$vUVC5], $rcJhr);
                    if (!(isset($XSw4v[$barO2]) && isset($rcJhr[1]))) {
                        goto j7ilg;
                    }
                    if (!is_array($XSw4v[$barO2])) {
                        goto nJlzN;
                    }
                    $grPNB = array();
                    $GHUVw = array();
                    $x7mOM = array();
                    foreach ($XSw4v[$barO2] as $BA181 => $g5ERf) {
                        $DEBiK = explode("\56", $barO2);
                        if (isset($DEBiK[1])) {
                            goto YEIuI;
                        }
                        $m3cM6 = $barO2;
                        goto wNIMk;
                        YEIuI:
                        $m3cM6 = $DEBiK[0] . "\137" . $DEBiK[1];
                        wNIMk:
                        $DEBiK = explode("\x28", $m3cM6);
                        if (!isset($DEBiK[1])) {
                            goto yt9Jm;
                        }
                        $m3cM6 = $DEBiK[0] . "\x5f" . explode("\x2c", $DEBiK[1])[0];
                        yt9Jm:
                        $grPNB["\72" . $m3cM6 . "\x69\x6e" . $BA181] = $g5ERf;
                        $GHUVw[] = "\72" . $m3cM6 . "\151\x6e" . $BA181;
                        lCyEi:
                    }
                    PC49J:
                    unset($XSw4v[$barO2]);
                    unset($lpE3B[1][$vUVC5]);
                    $k03wK = $lpE3B[0][$vUVC5];
                    unset($lpE3B[0][$vUVC5]);
                    $zYYAq = implode("\x2c", $GHUVw);
                    $JVjav = explode("\77", $k03wK);
                    $JVjav = implode($zYYAq, $JVjav);
                    $k03wK = str_replace(["\50", "\x3f", "\x29"], ["\x5c\x28", "\134\x3f", "\134\x29"], $k03wK);
                    $i5sHC = preg_replace("\x23\136" . $k03wK . "\x23", $JVjav, $i5sHC);
                    $i5sHC = preg_replace("\x23\x5c\163\x2a" . $k03wK . "\x23", "\x20" . $JVjav, $i5sHC);
                    $XSw4v = array_merge($XSw4v, $grPNB);
                    nJlzN:
                    j7ilg:
                    UDKEr:
                }
                xA7o3:
                wLSN0:
                $YAQt_ = explode("\77", $i5sHC);
                foreach ($YAQt_ as $h_rAt => $yx0Dy) {
                    if (!$yx0Dy) {
                        goto BJpGx;
                    }
                    if (isset($XSw4v[$h_rAt])) {
                        goto rDSG0;
                    }
                    if (!($h_rAt < count($YAQt_) - 1)) {
                        goto R5hPc;
                    }
                    $YAQt_[$h_rAt] = $yx0Dy . "\x3f";
                    R5hPc:
                    goto F8Lp9;
                    rDSG0:
                    if (!($h_rAt < count($YAQt_) - 1)) {
                        goto GmK2V;
                    }
                    $YAQt_[$h_rAt] = $yx0Dy . "\x3a\x5f\164\x6a" . $h_rAt;
                    $XSw4v["\72" . "\137\x74\x6a" . $h_rAt] = $XSw4v[$h_rAt];
                    unset($XSw4v[$h_rAt]);
                    GmK2V:
                    F8Lp9:
                    BJpGx:
                    kq4en:
                }
                uA7Y5:
                $i5sHC = implode('', $YAQt_);
                if (!(strpos($i5sHC, "\x3f") !== false)) {
                    goto BOebW;
                }
                E("\351\242\x84\345\xa4\x84\xe7\x90\206\345\x8f\x82\346\x95\xb0\xe6\225\260\xe9\x87\x8f\xe4\xb8\215\344\xb8\200\350\x87\xb4\61\357\274\x81");
                BOebW:
                $ry0T9 = explode("\72", $i5sHC);
                $C2oQ2 = false;
                foreach ($XSw4v as $BA181 => $barO2) {
                    if (!is_numeric($BA181)) {
                        goto zXz8F;
                    }
                    $C2oQ2 = true;
                    zXz8F:
                    xqOjf:
                }
                i828J:
                if (!$C2oQ2) {
                    goto EC4v8;
                }
                E("\351\xa2\204\xe5\xa4\204\347\x90\x86\345\217\202\xe6\x95\xb0\xe6\225\xb0\351\207\217\344\270\215\344\270\200\350\x87\264\62\xef\274\201");
                EC4v8:
                A3iIi:
                Z9XWg:
                $RW1_U = isset($nE20_["\154\151\155\x69\164"]) ? $nE20_["\154\151\155\x69\164"] : '';
                $LbgFd = isset($nE20_["\x6c\x69\156\153"]) ? $nE20_["\x6c\151\x6e\x6b"] : '';
                $NyF4O = isset($nE20_["\146\151\145\154\144"]) ? $nE20_["\x66\151\145\x6c\x64"] : "\52";
                $TcxG8 = array();
                if ($J8d5b) {
                    goto b3Dok;
                }
                foreach ($eFnND as $barO2) {
                    foreach ($DCnvr as $codoY => $OXqb0) {
                        $TcxG8[$codoY][] = "\47" . $barO2[$OXqb0] . "\x27";
                        kAZMB:
                    }
                    mv5ry:
                    xs_W9:
                }
                jP83S:
                goto EYzvG;
                b3Dok:
                foreach ($DCnvr as $codoY => $OXqb0) {
                    $TcxG8[$codoY][] = "\x27" . $eFnND[$OXqb0] . "\47";
                    CHGCD:
                }
                o1vI1:
                EYzvG:
                $H5lj8 = array();
                foreach ($slcN6 as $CiDyp => $g10C3) {
                    $TcxG8[$CiDyp] = array_unique($TcxG8[$CiDyp]);
                    $v_VIJ = implode("\54", $TcxG8[$CiDyp]);
                    $H5lj8[] = $g10C3 . "\x20\151\x6e\x28{$v_VIJ}\51";
                    Nbkva:
                }
                i2v1Y:
                $H5lj8 = implode("\40\x61\x6e\144\x20", $H5lj8);
                $RDqIy = "\163\x65\154\x65\x63\x74\x20{$NyF4O}\40\146\x72\157\155\x20{$vkzsN}\x20\x57\110\x45\x52\105\x20{$H5lj8}\x20{$i5sHC}\40{$cZoQw}";
                $h4_eT = $YFmXg->prepare($RDqIy);
                if ($XSw4v) {
                    goto wBekR;
                }
                $h4_eT->execute();
                goto qWP40;
                wBekR:
                $h4_eT->execute($XSw4v);
                qWP40:
                $xifzY = $h4_eT->fetchAll(\PDO::FETCH_ASSOC);
                if (!($LbgFd && $xifzY)) {
                    goto jHgCW;
                }
                $xifzY = $this->linkfind($xifzY, $LbgFd, $vkzsN, true);
                jHgCW:
                if ($J8d5b) {
                    goto Box34;
                }
                foreach ($eFnND as $rMCiT => $O3Gw3) {
                    if ($iH31H == "\x6f\x6e\x65\137\x6e\x75\155") {
                        goto aT2Lf;
                    }
                    $eFnND[$rMCiT][$DYs2P] = array();
                    goto fA9_K;
                    aT2Lf:
                    $eFnND[$rMCiT][$DYs2P] = 0;
                    fA9_K:
                    foreach ($xifzY as $CiDyp => $g10C3) {
                        $THPyn = 1;
                        foreach ($DCnvr as $opHyX => $Nfizw) {
                            if (isset($g10C3[$slcN6[$opHyX]])) {
                                goto qfJcQ;
                            }
                            $rbdwn = print_r($nE20_, true);
                            E("\xe5\x85\263\xe8\x81\224\346\237\xa5\350\xaf\xa2\347\273\x93\346\x9e\x9c\351\233\x86\xe7\xbc\xba\345\xb0\221" . $slcN6[$opHyX] . "\xe5\xad\227\xe6\256\265" . $rbdwn);
                            qfJcQ:
                            if ($O3Gw3[$Nfizw] == $g10C3[$slcN6[$opHyX]]) {
                                goto M_KNf;
                            }
                            $THPyn = 0;
                            goto W_xMF;
                            goto qUddo;
                            M_KNf:
                            goto nnD0_;
                            qUddo:
                            nnD0_:
                        }
                        W_xMF:
                        if (!($THPyn == 1)) {
                            goto bFxgF;
                        }
                        if ($RW1_U) {
                            goto YY7oV;
                        }
                        if ($iH31H == "\x6f\156\145\x5f\157\x6e\x65") {
                            goto Y4OLp;
                        }
                        if ($iH31H == "\x6f\156\x65\x5f\141\x6c\x6c") {
                            goto GVgtg;
                        }
                        if (!($iH31H == "\157\156\x65\x5f\x6e\165\155")) {
                            goto yZsLR;
                        }
                        if (is_array($eFnND[$rMCiT][$DYs2P])) {
                            goto rbYQ8;
                        }
                        $eFnND[$rMCiT][$DYs2P]++;
                        goto D8JEx;
                        rbYQ8:
                        $eFnND[$rMCiT][$DYs2P] = count($eFnND[$rMCiT][$DYs2P]) + 1;
                        D8JEx:
                        yZsLR:
                        goto he5rj;
                        GVgtg:
                        $eFnND[$rMCiT][$DYs2P][] = $g10C3;
                        he5rj:
                        goto MEngQ;
                        Y4OLp:
                        $eFnND[$rMCiT][$DYs2P] = $g10C3;
                        goto I6SNQ;
                        MEngQ:
                        goto QUxuc;
                        YY7oV:
                        if (count($eFnND[$rMCiT][$DYs2P]) < $RW1_U) {
                            goto EZvTv;
                        }
                        goto R4Ynz;
                        goto UTTo9;
                        EZvTv:
                        if ($iH31H == "\157\156\145\137\x6f\x6e\x65") {
                            goto uaAsR;
                        }
                        if ($iH31H == "\x6f\156\145\x5f\141\x6c\154") {
                            goto CUHBi;
                        }
                        if (!($iH31H == "\157\156\145\x5f\156\165\155")) {
                            goto Gq8K9;
                        }
                        if (is_array($eFnND[$rMCiT][$DYs2P])) {
                            goto wbw5W;
                        }
                        $eFnND[$rMCiT][$DYs2P]++;
                        goto cs3jt;
                        wbw5W:
                        $eFnND[$rMCiT][$DYs2P] = count($eFnND[$rMCiT][$DYs2P]) + 1;
                        cs3jt:
                        Gq8K9:
                        goto rZj9x;
                        CUHBi:
                        $eFnND[$rMCiT][$DYs2P][] = $g10C3;
                        rZj9x:
                        goto AtIHZ;
                        uaAsR:
                        $eFnND[$rMCiT][$DYs2P] = $g10C3;
                        goto I6SNQ;
                        AtIHZ:
                        UTTo9:
                        QUxuc:
                        bFxgF:
                        R4Ynz:
                    }
                    I6SNQ:
                    IST12:
                }
                VnIu3:
                goto nInlp;
                Box34:
                if ($iH31H == "\x6f\156\145\137\x6e\x75\x6d") {
                    goto WSrP2;
                }
                $eFnND[$DYs2P] = array();
                goto VIa1o;
                WSrP2:
                $eFnND[$DYs2P] = 0;
                VIa1o:
                foreach ($xifzY as $CiDyp => $g10C3) {
                    $THPyn = 1;
                    foreach ($DCnvr as $opHyX => $Nfizw) {
                        if (isset($g10C3[$slcN6[$opHyX]])) {
                            goto si3mi;
                        }
                        $rbdwn = print_r($nE20_, true);
                        E("\xe5\x85\263\xe8\x81\x94\346\x9f\245\xe8\xaf\xa2\xe7\xbb\x93\xe6\x9e\234\xe9\x9b\206\xe7\xbc\xba\345\xb0\221" . $slcN6[$opHyX] . "\345\xad\227\xe6\256\xb5" . $rbdwn);
                        si3mi:
                        if ($eFnND[$Nfizw] == $g10C3[$slcN6[$opHyX]]) {
                            goto PzmIr;
                        }
                        $THPyn = 0;
                        goto IHSWb;
                        goto h0iUw;
                        PzmIr:
                        goto bAtxo;
                        h0iUw:
                        bAtxo:
                    }
                    IHSWb:
                    if (!($THPyn == 1)) {
                        goto g2b_Z;
                    }
                    if ($RW1_U) {
                        goto odyZh;
                    }
                    if ($iH31H == "\157\x6e\x65\x5f\157\156\145") {
                        goto bW08r;
                    }
                    if ($iH31H == "\157\x6e\x65\x5f\x61\x6c\154") {
                        goto pAGbm;
                    }
                    if (!($iH31H == "\x6f\156\145\137\156\165\155")) {
                        goto GIhEo;
                    }
                    if (is_array($eFnND[$DYs2P])) {
                        goto Hhl4T;
                    }
                    $eFnND[$DYs2P]++;
                    goto NGr1B;
                    Hhl4T:
                    $eFnND[$DYs2P] = count($eFnND[$DYs2P]) + 1;
                    NGr1B:
                    GIhEo:
                    goto ooQPP;
                    pAGbm:
                    $eFnND[$DYs2P][] = $g10C3;
                    ooQPP:
                    goto M6Qnu;
                    bW08r:
                    $eFnND[$DYs2P] = $g10C3;
                    goto kSZ10;
                    M6Qnu:
                    goto i2mjg;
                    odyZh:
                    if (count($eFnND[$DYs2P]) < $RW1_U) {
                        goto IAY1a;
                    }
                    goto XbIZu;
                    goto kLWZZ;
                    IAY1a:
                    if ($iH31H == "\157\156\x65\x5f\x6f\156\145") {
                        goto ebu0m;
                    }
                    if ($iH31H == "\x6f\156\x65\x5f\141\154\154") {
                        goto qlEte;
                    }
                    if (!($iH31H == "\157\x6e\145\x5f\x6e\x75\x6d")) {
                        goto ZULKA;
                    }
                    if (is_array($eFnND[$DYs2P])) {
                        goto IYvlC;
                    }
                    $eFnND[$DYs2P]++;
                    goto cqpTV;
                    IYvlC:
                    $eFnND[$DYs2P] = count($eFnND[$DYs2P]) + 1;
                    cqpTV:
                    ZULKA:
                    goto dHXeM;
                    qlEte:
                    $eFnND[$DYs2P][] = $g10C3;
                    dHXeM:
                    goto F5pDL;
                    ebu0m:
                    $eFnND[$DYs2P] = $g10C3;
                    goto kSZ10;
                    F5pDL:
                    kLWZZ:
                    i2mjg:
                    g2b_Z:
                    XbIZu:
                }
                kSZ10:
                nInlp:
                PuxaM:
            }
            nRPoD:
            return $eFnND;
        }
        public function begin()
        {
            $YFmXg = $this->db;
            if (!$YFmXg->beginTransaction()) {
                goto NuQ8R;
            }
            $this->begin = true;
            NuQ8R:
        }
        public function commit()
        {
            $YFmXg = $this->db;
            $YFmXg->commit();
        }
        public function rollback()
        {
            $YFmXg = $this->db;
            $YFmXg->rollBack();
        }
        public function data($I6Fah = array())
        {
            if ($I6Fah) {
                goto qXt9U;
            }
            E("\144\x61\164\141\xe6\x96\271\346\263\x95\345\x8f\x82\xe6\x95\xb0\xe4\270\215\xe8\x83\275\344\xb8\xba\xe7\xa9\272");
            qXt9U:
            $Wh3YY = $this->fields();
            if (array_depth($I6Fah) == 1) {
                goto LLa74;
            }
            if (!(array_depth($I6Fah) == 2)) {
                goto bmJOq;
            }
            foreach ($I6Fah as $vUVC5 => $barO2) {
                foreach ($barO2 as $ix_bx => $r66ch) {
                    if (in_array($ix_bx, $Wh3YY)) {
                        goto S5MYp;
                    }
                    unset($I6Fah[$vUVC5][$ix_bx]);
                    S5MYp:
                    hXdEe:
                }
                d0GYI:
                gRFJq:
            }
            J1Aa6:
            bmJOq:
            goto Mktyj;
            LLa74:
            foreach ($I6Fah as $vUVC5 => $barO2) {
                if (in_array($vUVC5, $Wh3YY)) {
                    goto YzjDc;
                }
                unset($I6Fah[$vUVC5]);
                YzjDc:
                Sd6uk:
            }
            oHbLR:
            Mktyj:
            $this->data = $I6Fah;
            return $this;
        }
        public function add()
        {
            $YFmXg = $this->db;
            $xkJ01 = $this->table;
            $I6Fah = $this->data;
            $Nl_y3 = $this->isdump;
            $WKbDg = $this->ruleresult;
            if (!$WKbDg) {
                goto iDLch;
            }
            $this->ruleresult = false;
            return $WKbDg;
            iDLch:
            if ($xkJ01) {
                goto XEdSa;
            }
            E("\346\234\xaa\346\211\xbe\345\210\260\x74\x61\x62\x6c\x65\xe5\x8f\x82\xe6\225\xb0");
            XEdSa:
            if ($I6Fah) {
                goto q5ecV;
            }
            E("\346\227\xa0\xe6\234\x89\xe6\x95\210\xe6\x96\260\345\xa2\x9e\xe6\x95\xb0\346\215\xae\357\274\214\xe8\xaf\xb7\346\xa3\200\346\x9f\xa5\144\141\164\141\346\x96\xb9\xe6\263\225\xe7\232\204\345\x8f\202\346\x95\xb0");
            q5ecV:
            if (is_array($I6Fah)) {
                goto rPQDl;
            }
            E("\x64\141\x74\141\xe6\x96\xb9\xe6\xb3\225\xe5\x8f\252\xe6\216\xa5\346\224\xb6\xe7\xb4\242\345\xbc\x95\346\x95\260\xe7\273\204");
            rPQDl:
            if (array_depth($I6Fah) == 1) {
                goto kcmnr;
            }
            if (array_depth($I6Fah) == 2) {
                goto HQcT2;
            }
            E("\x64\x61\x74\141\346\226\xb9\xe6\xb3\225\xe5\x8f\252\346\216\245\xe6\x94\xb6\61\347\xbb\264\xe6\210\x96\62\347\xbb\xb4\346\225\xb0\347\273\204" . print_r($I6Fah, true));
            goto zRrWB;
            HQcT2:
            $I6Fah = array_values($I6Fah);
            if (isset($I6Fah[0])) {
                goto pv5l8;
            }
            E("\x64\141\x74\141\346\226\271\346\263\225\xe5\x8f\xaa\346\x8e\xa5\xe6\224\xb6\347\264\xa2\345\xbc\x95\xe6\225\xb0\347\273\204");
            goto Ei8VN;
            pv5l8:
            $N4Sve = array_keys($I6Fah[0]);
            $N4Sve = implode("\54", $N4Sve);
            $ALU_y = array();
            $JjcfY = array();
            foreach ($I6Fah as $vUVC5 => $barO2) {
                foreach ($barO2 as $r66ch) {
                    $JjcfY[] = $r66ch;
                    $ALU_y[$vUVC5][] = "\x3f";
                    pTlTx:
                }
                kLP6l:
                kgmk8:
            }
            YIVq7:
            foreach ($ALU_y as $vUVC5 => $barO2) {
                $ALU_y[$vUVC5] = "\50" . implode("\54", $barO2) . "\51";
                E0jc4:
            }
            kOXOR:
            $ALU_y = implode("\54", $ALU_y);
            $o5ozR = "\x49\116\x53\105\122\124\x20\x49\116\x54\117\x20{$xkJ01}\x20\50{$N4Sve}\x29\40\x56\x41\114\125\x45\x53\40{$ALU_y}";
            Ei8VN:
            zRrWB:
            goto WclIl;
            kcmnr:
            $N4Sve = array_keys($I6Fah);
            $BVpBh = implode("\54", $N4Sve);
            $J0XeG = "\72" . implode("\x2c\72", $N4Sve);
            $JjcfY = array();
            foreach ($I6Fah as $vUVC5 => $barO2) {
                $JjcfY["\x3a" . $vUVC5] = $barO2;
                pKbiW:
            }
            EG7bz:
            $o5ozR = "\111\116\123\x45\x52\x54\x20\111\x4e\124\x4f\40{$xkJ01}\40\x28{$BVpBh}\51\x20\126\101\x4c\125\x45\123\40\50{$J0XeG}\51\73";
            WclIl:
            if (!$Nl_y3) {
                goto Dp0Lj;
            }
            echo $o5ozR . PHP_EOL;
            print_r($JjcfY);
            die;
            Dp0Lj:
            $jyD6n = $YFmXg->prepare($o5ozR);
            $jyD6n->execute($JjcfY);
            if (array_depth($I6Fah) == 1) {
                goto rLphP;
            }
            $eFnND = $jyD6n->rowCount();
            goto Alg8u;
            rLphP:
            $eFnND = $YFmXg->lastInsertId();
            Alg8u:
            $this->where = '';
            $this->field = "\52";
            $this->bind = array();
            $this->join = null;
            $this->groupby = null;
            $this->having = null;
            $this->orderby = null;
            $this->limit = null;
            $this->forupdate = null;
            $this->findone = false;
            $this->tableid = null;
            $this->table = null;
            $this->format = [];
            $this->currentpage = null;
            $this->pagesize = null;
            $this->pagelen = null;
            $this->data = null;
            $this->rules = null;
            $this->ruleresult = null;
            $this->linker = null;
            $this->linkerbind = [];
            $this->keyword = null;
            $this->keyword_array = [];
            $this->match = null;
            $this->matchtype = null;
            $this->link = [];
            return $eFnND;
        }
        public function update()
        {
            $YFmXg = $this->db;
            $xkJ01 = $this->table;
            $I6Fah = $this->data;
            $Nl_y3 = $this->isdump;
            $WKbDg = $this->ruleresult;
            if (!$WKbDg) {
                goto Y0Oto;
            }
            $this->ruleresult = false;
            return $WKbDg;
            Y0Oto:
            if ($xkJ01) {
                goto g2VIO;
            }
            E("\xe6\x9c\252\346\x89\276\345\210\260\x74\x61\x62\154\x65\xe5\x8f\202\xe6\x95\260");
            g2VIO:
            if (!$I6Fah) {
                goto nEjf4;
            }
            if (!is_array($I6Fah)) {
                goto bl3iJ;
            }
            if (!(array_depth($I6Fah) != 1)) {
                goto oM1lu;
            }
            E("\165\160\144\x61\164\x65\xe5\217\252\346\x94\xaf\346\214\201\144\141\x74\x61\344\270\x80\xe7\xbb\264\xe6\225\260\xe7\xbb\204\xe5\x8f\202\346\x95\260");
            oM1lu:
            goto xJ_cB;
            bl3iJ:
            E("\x75\x70\144\141\164\145\345\x8f\xaa\346\224\xaf\346\214\201\x64\141\164\x61\344\xb8\x80\347\xbb\264\xe6\x95\260\xe7\xbb\204\xe5\x8f\x82\xe6\x95\260");
            xJ_cB:
            goto bgNuR;
            nEjf4:
            E("\xe6\227\240\346\234\x89\xe6\x95\x88\xe6\233\264\xe6\226\260\346\x95\260\xe6\x8d\256\xef\274\214\350\xaf\267\xe6\243\x80\xe6\x9f\245\x64\x61\164\x61\346\x96\xb9\346\263\225\347\x9a\204\345\x8f\202\346\225\xb0");
            bgNuR:
            $i5sHC = $this->where;
            $XSw4v = $this->bind;
            if ($i5sHC) {
                goto XaF9i;
            }
            $WFU8N = $this->primary();
            if (array_key_exists($WFU8N, $I6Fah)) {
                goto PwHCP;
            }
            E("\xe6\234\252\xe6\211\xbe\xe5\x88\260\xe6\x9b\264\xe6\226\260\xe6\235\241\344\xbb\xb6");
            goto FBnC_;
            PwHCP:
            $i5sHC = "\x57\x48\x45\x52\105\x20" . $WFU8N . "\75\x3a" . $WFU8N;
            $XSw4v["\72" . $WFU8N] = $I6Fah[$WFU8N];
            unset($I6Fah[$WFU8N]);
            FBnC_:
            goto d1pG7;
            XaF9i:
            preg_match_all("\43\x28\134\167\52\x29\x28\77\x3a\134\163\x2b\x69\x6e\x5c\163\x2a\134\50\x5c\x3f\134\51\174\134\x73\x2b\156\x6f\164\x5c\163\53\x69\156\134\163\x2a\x5c\x28\134\77\134\51\51\x23", $i5sHC, $lpE3B);
            $MBX6x = $lpE3B[1] ?? [];
            if (!$MBX6x) {
                goto FfkvB;
            }
            foreach ($lpE3B[1] as $vUVC5 => $barO2) {
                preg_match("\43\50\x69\x6e\x5c\163\52\134\50\134\77\134\x29\x7c\156\x6f\x74\40\151\156\134\x73\x2a\x5c\50\x5c\77\x5c\x29\x29\x23\x69", $lpE3B[0][$vUVC5], $rcJhr);
                if (!(isset($XSw4v[$barO2]) && isset($rcJhr[1]))) {
                    goto TVzW6;
                }
                if (!is_array($XSw4v[$barO2])) {
                    goto MFcFp;
                }
                $grPNB = array();
                $GHUVw = array();
                $x7mOM = array();
                foreach ($XSw4v[$barO2] as $BA181 => $g5ERf) {
                    $DEBiK = explode("\x2e", $barO2);
                    if (isset($DEBiK[1])) {
                        goto z6TAb;
                    }
                    $m3cM6 = $barO2;
                    goto iAvSB;
                    z6TAb:
                    $m3cM6 = $DEBiK[0] . "\x5f" . $DEBiK[1];
                    iAvSB:
                    $DEBiK = explode("\x28", $m3cM6);
                    if (!isset($DEBiK[1])) {
                        goto nwDy1;
                    }
                    $m3cM6 = $DEBiK[0] . "\x5f" . explode("\54", $DEBiK[1])[0];
                    nwDy1:
                    $grPNB["\72" . $m3cM6 . "\x69\156" . $BA181] = $g5ERf;
                    $GHUVw[] = "\x3a" . $m3cM6 . "\151\156" . $BA181;
                    HLYNs:
                }
                PlqZr:
                unset($XSw4v[$barO2]);
                unset($lpE3B[1][$vUVC5]);
                $k03wK = $lpE3B[0][$vUVC5];
                unset($lpE3B[0][$vUVC5]);
                $zYYAq = implode("\54", $GHUVw);
                $JVjav = explode("\x3f", $k03wK);
                $JVjav = implode($zYYAq, $JVjav);
                $k03wK = str_replace(["\50", "\77", "\51"], ["\134\50", "\134\x3f", "\x5c\51"], $k03wK);
                $i5sHC = preg_replace("\x23\x5e" . $k03wK . "\43", $JVjav, $i5sHC);
                $i5sHC = preg_replace("\43\x5c\163\x2a" . $k03wK . "\x23", "\40" . $JVjav, $i5sHC);
                $XSw4v = array_merge($XSw4v, $grPNB);
                MFcFp:
                TVzW6:
                QBlAk:
            }
            Wzv0O:
            FfkvB:
            $YAQt_ = explode("\x3f", $i5sHC);
            foreach ($YAQt_ as $h_rAt => $yx0Dy) {
                if (!$yx0Dy) {
                    goto Zng9b;
                }
                if (isset($XSw4v[$h_rAt])) {
                    goto M5zxm;
                }
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto oZY8b;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\77";
                oZY8b:
                goto yU3SQ;
                M5zxm:
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto guQHC;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\x3a\x5f\x74\x6a" . $h_rAt;
                $XSw4v["\x3a" . "\137\x74\x6a" . $h_rAt] = $XSw4v[$h_rAt];
                unset($XSw4v[$h_rAt]);
                guQHC:
                yU3SQ:
                Zng9b:
                uE9s6:
            }
            hyLDi:
            $i5sHC = implode('', $YAQt_);
            if (!(strpos($i5sHC, "\77") !== false)) {
                goto vOUKb;
            }
            E("\xe9\242\204\xe5\244\x84\347\220\206\xe5\x8f\x82\346\225\xb0\xe6\x95\260\xe9\207\217\344\270\x8d\344\270\x80\xe8\x87\264\64\xef\274\201");
            vOUKb:
            $ry0T9 = explode("\x3a", $i5sHC);
            $C2oQ2 = false;
            foreach ($XSw4v as $BA181 => $barO2) {
                if (!is_numeric($BA181)) {
                    goto Eq89F;
                }
                $C2oQ2 = true;
                Eq89F:
                BbXEy:
            }
            vs7xf:
            if (!$C2oQ2) {
                goto iM1Lb;
            }
            E("\351\242\x84\xe5\244\x84\347\x90\x86\345\x8f\202\346\x95\260\xe6\x95\260\xe9\207\217\xe4\270\215\344\xb8\200\350\207\xb4\x35\357\xbc\x81");
            iM1Lb:
            $i5sHC = "\167\150\x65\162\x65\x20" . $i5sHC;
            d1pG7:
            $N4Sve = array_keys($I6Fah);
            $RRpHO = array();
            foreach ($N4Sve as $barO2) {
                if (isset($XSw4v["\x3a" . $barO2])) {
                    goto YZNZT;
                }
                $RRpHO[] = $barO2 . "\x3d\x3a" . $barO2;
                $XSw4v["\x3a" . $barO2] = $I6Fah[$barO2];
                goto n3mVn;
                YZNZT:
                $RRpHO[] = $barO2 . "\75\x3a" . $barO2 . "\x5f\163\145\x74";
                $XSw4v["\x3a" . $barO2 . "\x5f\163\145\x74"] = $I6Fah[$barO2];
                n3mVn:
                uhGaT:
            }
            dTE8Q:
            $RRpHO = implode("\54", $RRpHO);
            $o5ozR = "\125\120\x44\101\124\105\x20{$xkJ01}\40\123\105\124\40{$RRpHO}\x20{$i5sHC}";
            if (!$Nl_y3) {
                goto MWxkh;
            }
            echo $o5ozR . PHP_EOL;
            print_r($XSw4v);
            die;
            MWxkh:
            $jyD6n = $YFmXg->prepare($o5ozR);
            $jyD6n->execute($XSw4v);
            $eFnND = $jyD6n->rowCount();
            $this->where = '';
            $this->field = "\x2a";
            $this->bind = array();
            $this->join = null;
            $this->groupby = null;
            $this->having = null;
            $this->orderby = null;
            $this->limit = null;
            $this->forupdate = null;
            $this->findone = false;
            $this->tableid = null;
            $this->table = null;
            $this->format = [];
            $this->currentpage = null;
            $this->pagesize = null;
            $this->pagelen = null;
            $this->data = null;
            $this->rules = null;
            $this->ruleresult = null;
            $this->linker = null;
            $this->linkerbind = [];
            $this->keyword = null;
            $this->keyword_array = [];
            $this->match = null;
            $this->matchtype = null;
            $this->link = [];
            $this->table = null;
            if ($eFnND > 0) {
                goto dVp5f;
            }
            if ($eFnND === 0) {
                goto GXo1I;
            }
            return false;
            goto KgC5M;
            dVp5f:
            return $eFnND;
            goto KgC5M;
            GXo1I:
            return true;
            KgC5M:
        }
        public function decr($N4Sve = array())
        {
            $eFnND = $this->incr($N4Sve, 2);
            return $eFnND;
        }
        public function incr($N4Sve = array(), $iH31H = 1)
        {
            $YFmXg = $this->db;
            $xkJ01 = $this->table;
            $i5sHC = $this->where;
            $XSw4v = $this->bind;
            $Nl_y3 = $this->isdump;
            if ($xkJ01) {
                goto iRlfu;
            }
            E("\346\234\252\346\211\xbe\xe5\x88\260\164\x61\142\154\x65\345\217\x82\346\x95\xb0");
            iRlfu:
            if ($N4Sve) {
                goto fsSH0;
            }
            if ($iH31H == 1) {
                goto dG64d;
            }
            if (!($iH31H == 2)) {
                goto pDYna;
            }
            E("\346\227\xa0\xe6\x9c\211\xe6\x95\x88\xe6\233\xb4\xe6\226\260\xe6\x95\260\xe6\215\xae\xef\xbc\x8c\350\xaf\xb7\xe6\243\x80\346\x9f\xa5\144\x65\x63\162\xe5\x8f\202\346\225\260\xe7\232\204\xe5\x8f\x82\xe6\225\260");
            pDYna:
            goto tnxSR;
            dG64d:
            E("\346\x97\xa0\xe6\234\211\346\225\210\xe6\233\xb4\346\226\xb0\346\225\xb0\346\215\256\xef\274\x8c\350\257\267\xe6\xa3\x80\346\237\245\x69\x6e\143\x72\xe5\217\x82\xe6\225\260\347\232\204\xe5\217\202\346\x95\xb0");
            tnxSR:
            fsSH0:
            if ($i5sHC) {
                goto KxVVz;
            }
            if ($iH31H == 1) {
                goto Q4wW_;
            }
            if (!($iH31H == 2)) {
                goto VsCN5;
            }
            E("\x64\x65\x63\x72\xe6\226\xb9\346\xb3\x95\345\277\x85\351\241\273\xe8\256\xbe\xe7\275\256\x77\x68\x65\162\145\xe6\235\241\344\273\266");
            VsCN5:
            goto I1D8P;
            Q4wW_:
            E("\x69\x6e\x63\162\xe6\226\271\xe6\263\x95\xe5\xbf\x85\xe9\241\xbb\xe8\xae\xbe\xe7\xbd\xae\x77\150\x65\x72\x65\xe6\x9d\xa1\xe4\xbb\266");
            I1D8P:
            goto eGHqj;
            KxVVz:
            preg_match_all("\43\50\x5c\167\52\x29\50\x3f\x3a\134\163\53\x69\x6e\134\x73\x2a\x5c\x28\134\x3f\x5c\51\174\134\x73\x2b\x6e\x6f\x74\134\163\x2b\151\x6e\x5c\163\52\134\x28\134\x3f\134\x29\x29\x23", $i5sHC, $lpE3B);
            $MBX6x = $lpE3B[1] ?? [];
            if (!$MBX6x) {
                goto OVyLe;
            }
            foreach ($lpE3B[1] as $vUVC5 => $barO2) {
                preg_match("\43\x28\151\156\x5c\x73\x2a\134\x28\134\77\x5c\51\x7c\x6e\x6f\x74\x20\x69\156\x5c\x73\x2a\134\50\x5c\77\134\51\x29\x23\151", $lpE3B[0][$vUVC5], $rcJhr);
                if (!(isset($XSw4v[$barO2]) && isset($rcJhr[1]))) {
                    goto gD_vO;
                }
                if (!is_array($XSw4v[$barO2])) {
                    goto ZElYu;
                }
                $grPNB = array();
                $GHUVw = array();
                $x7mOM = array();
                foreach ($XSw4v[$barO2] as $BA181 => $g5ERf) {
                    $DEBiK = explode("\56", $barO2);
                    if (isset($DEBiK[1])) {
                        goto yBo_4;
                    }
                    $m3cM6 = $barO2;
                    goto RSH5M;
                    yBo_4:
                    $m3cM6 = $DEBiK[0] . "\x5f" . $DEBiK[1];
                    RSH5M:
                    $DEBiK = explode("\50", $m3cM6);
                    if (!isset($DEBiK[1])) {
                        goto tZuPo;
                    }
                    $m3cM6 = $DEBiK[0] . "\x5f" . explode("\54", $DEBiK[1])[0];
                    tZuPo:
                    $grPNB["\x3a" . $m3cM6 . "\151\156" . $BA181] = $g5ERf;
                    $GHUVw[] = "\x3a" . $m3cM6 . "\x69\x6e" . $BA181;
                    i3Pqo:
                }
                Uke0e:
                unset($XSw4v[$barO2]);
                unset($lpE3B[1][$vUVC5]);
                $k03wK = $lpE3B[0][$vUVC5];
                unset($lpE3B[0][$vUVC5]);
                $zYYAq = implode("\x2c", $GHUVw);
                $JVjav = explode("\77", $k03wK);
                $JVjav = implode($zYYAq, $JVjav);
                $k03wK = str_replace(["\x28", "\x3f", "\x29"], ["\134\50", "\134\77", "\x5c\x29"], $k03wK);
                $i5sHC = preg_replace("\43\136" . $k03wK . "\43", $JVjav, $i5sHC);
                $i5sHC = preg_replace("\43\134\x73\x2a" . $k03wK . "\x23", "\40" . $JVjav, $i5sHC);
                $XSw4v = array_merge($XSw4v, $grPNB);
                ZElYu:
                gD_vO:
                SQn0q:
            }
            E_Hpm:
            OVyLe:
            $YAQt_ = explode("\x3f", $i5sHC);
            foreach ($YAQt_ as $h_rAt => $yx0Dy) {
                if (!$yx0Dy) {
                    goto lXids;
                }
                if (isset($XSw4v[$h_rAt])) {
                    goto L2KD7;
                }
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto tl0sh;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\x3f";
                tl0sh:
                goto a__Y1;
                L2KD7:
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto GcE1B;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\72\137\x74\x6a" . $h_rAt;
                $XSw4v["\x3a" . "\137\164\152" . $h_rAt] = $XSw4v[$h_rAt];
                unset($XSw4v[$h_rAt]);
                GcE1B:
                a__Y1:
                lXids:
                QYduC:
            }
            HvTGH:
            $i5sHC = implode('', $YAQt_);
            if (!(strpos($i5sHC, "\77") !== false)) {
                goto AdV7E;
            }
            E("\xe9\242\204\xe5\244\x84\xe7\x90\x86\xe5\x8f\202\346\x95\260\xe6\x95\xb0\351\x87\217\xe4\xb8\215\xe4\270\200\350\x87\xb4\67\357\274\201");
            AdV7E:
            $ry0T9 = explode("\72", $i5sHC);
            $C2oQ2 = false;
            foreach ($XSw4v as $BA181 => $barO2) {
                if (!is_numeric($BA181)) {
                    goto qbQJ2;
                }
                $C2oQ2 = true;
                qbQJ2:
                C8xKt:
            }
            naevi:
            if (!$C2oQ2) {
                goto DyODr;
            }
            E("\351\xa2\204\xe5\244\x84\347\x90\x86\xe5\x8f\202\346\x95\xb0\xe6\x95\xb0\xe9\207\217\xe4\270\x8d\xe4\270\200\350\207\xb4\x38\357\xbc\x81");
            DyODr:
            $i5sHC = "\x77\150\145\x72\x65\40" . $i5sHC;
            $Tzm7I = $this->fields_type();
            $a1qOT = array_keys($N4Sve);
            foreach ($Tzm7I as $swUH2) {
                if (!in_array($swUH2["\x46\x69\x65\154\144"], $a1qOT)) {
                    goto lNYYo;
                }
                if (!(strpos($swUH2["\124\x79\160\145"], "\x69\x6e\x74") !== 0)) {
                    goto KbLzk;
                }
                if ($iH31H == 1) {
                    goto KZnTB;
                }
                E("\351\x9d\236\346\225\264\xe7\xb1\xbb\xe6\225\xb0\xe6\x8d\256\344\270\x8d\xe8\203\xbd\344\xbd\277\347\224\250\x64\145\143\162\xe6\226\xb9\346\xb3\x95");
                goto bxfBD;
                KZnTB:
                E("\351\235\x9e\346\x95\xb4\xe7\xb1\xbb\xe6\225\260\xe6\215\256\344\270\215\xe8\x83\275\xe4\xbd\277\347\224\xa8\x69\156\x63\x72\346\226\xb9\346\xb3\225");
                bxfBD:
                KbLzk:
                lNYYo:
                KUZNk:
            }
            a0UcR:
            if ($iH31H == 1) {
                goto IIMD8;
            }
            if (!($iH31H == 2)) {
                goto w70k9;
            }
            $RRpHO = array();
            foreach ($N4Sve as $vUVC5 => $barO2) {
                $RRpHO[] = $vUVC5 . "\x3d" . $vUVC5 . "\55" . (int) $barO2;
                PKqXN:
            }
            FRaw2:
            w70k9:
            goto Bz8dP;
            IIMD8:
            $RRpHO = array();
            foreach ($N4Sve as $vUVC5 => $barO2) {
                $RRpHO[] = $vUVC5 . "\75" . $vUVC5 . "\x2b" . (int) $barO2;
                pTvnI:
            }
            SqyFt:
            Bz8dP:
            $RRpHO = implode("\54", $RRpHO);
            $o5ozR = "\125\120\x44\x41\x54\105\40{$xkJ01}\40\x53\105\x54\x20{$RRpHO}\x20{$i5sHC}";
            if (!$Nl_y3) {
                goto RezlO;
            }
            echo $o5ozR . PHP_EOL;
            print_r($XSw4v);
            die;
            RezlO:
            $jyD6n = $YFmXg->prepare($o5ozR);
            $jyD6n->execute($XSw4v);
            $eFnND = $jyD6n->rowCount();
            $this->where = '';
            $this->field = "\x2a";
            $this->bind = array();
            $this->join = null;
            $this->groupby = null;
            $this->having = null;
            $this->orderby = null;
            $this->limit = null;
            $this->forupdate = null;
            $this->findone = false;
            $this->tableid = null;
            $this->table = null;
            $this->format = [];
            $this->currentpage = null;
            $this->pagesize = null;
            $this->pagelen = null;
            $this->data = null;
            $this->rules = null;
            $this->ruleresult = null;
            $this->linker = null;
            $this->linkerbind = [];
            $this->keyword = null;
            $this->keyword_array = [];
            $this->match = null;
            $this->matchtype = null;
            $this->link = [];
            if ($eFnND > 0) {
                goto rTS2A;
            }
            if ($eFnND == 0) {
                goto slnks;
            }
            return false;
            goto RIhcp;
            rTS2A:
            return $eFnND;
            goto RIhcp;
            slnks:
            return true;
            RIhcp:
            eGHqj:
        }
        public function del($JARZz = false)
        {
            $YFmXg = $this->db;
            $xkJ01 = $this->table;
            $i5sHC = $this->where;
            $XSw4v = $this->bind;
            $Nl_y3 = $this->isdump;
            if ($xkJ01) {
                goto kF1Vy;
            }
            E("\346\234\252\xe6\x89\276\xe5\x88\260\164\x61\142\x6c\x65\345\217\202\xe6\x95\260");
            kF1Vy:
            if ($i5sHC) {
                goto Bpi7c;
            }
            E("\x64\145\154\xe6\226\271\xe6\263\x95\345\277\x85\351\xa1\273\xe8\xae\xbe\xe7\275\256\x77\x68\145\162\x65\xe6\x9d\241\xe4\273\xb6");
            goto oNJpB;
            Bpi7c:
            preg_match_all("\x23\x28\134\167\x2a\51\50\77\72\x5c\x73\53\x69\156\134\163\x2a\x5c\x28\x5c\x3f\x5c\x29\x7c\134\163\53\x6e\x6f\x74\x5c\163\53\x69\156\x5c\x73\x2a\x5c\50\134\x3f\x5c\51\51\x23", $i5sHC, $lpE3B);
            $MBX6x = $lpE3B[1] ?? [];
            if (!$MBX6x) {
                goto m6Q08;
            }
            foreach ($lpE3B[1] as $vUVC5 => $barO2) {
                preg_match("\x23\x28\151\156\134\x73\52\134\50\x5c\x3f\134\51\174\x6e\x6f\164\x20\x69\156\134\x73\x2a\x5c\x28\134\77\134\x29\51\43\151", $lpE3B[0][$vUVC5], $rcJhr);
                if (!(isset($XSw4v[$barO2]) && isset($rcJhr[1]))) {
                    goto CRx6Z;
                }
                if (!is_array($XSw4v[$barO2])) {
                    goto crruc;
                }
                $grPNB = array();
                $GHUVw = array();
                $x7mOM = array();
                foreach ($XSw4v[$barO2] as $BA181 => $g5ERf) {
                    $DEBiK = explode("\x2e", $barO2);
                    if (isset($DEBiK[1])) {
                        goto egPUk;
                    }
                    $m3cM6 = $barO2;
                    goto knwpq;
                    egPUk:
                    $m3cM6 = $DEBiK[0] . "\137" . $DEBiK[1];
                    knwpq:
                    $DEBiK = explode("\50", $m3cM6);
                    if (!isset($DEBiK[1])) {
                        goto hDPHw;
                    }
                    $m3cM6 = $DEBiK[0] . "\x5f" . explode("\x2c", $DEBiK[1])[0];
                    hDPHw:
                    $grPNB["\x3a" . $m3cM6 . "\151\156" . $BA181] = $g5ERf;
                    $GHUVw[] = "\72" . $m3cM6 . "\x69\156" . $BA181;
                    ozCJy:
                }
                gxro3:
                unset($XSw4v[$barO2]);
                unset($lpE3B[1][$vUVC5]);
                $k03wK = $lpE3B[0][$vUVC5];
                unset($lpE3B[0][$vUVC5]);
                $zYYAq = implode("\x2c", $GHUVw);
                $JVjav = explode("\x3f", $k03wK);
                $JVjav = implode($zYYAq, $JVjav);
                $k03wK = str_replace(["\x28", "\77", "\51"], ["\134\50", "\134\77", "\x5c\51"], $k03wK);
                $i5sHC = preg_replace("\43\x5e" . $k03wK . "\43", $JVjav, $i5sHC);
                $i5sHC = preg_replace("\43\134\x73\52" . $k03wK . "\43", "\x20" . $JVjav, $i5sHC);
                $XSw4v = array_merge($XSw4v, $grPNB);
                crruc:
                CRx6Z:
                T_Ijq:
            }
            HsfLJ:
            m6Q08:
            $YAQt_ = explode("\x3f", $i5sHC);
            foreach ($YAQt_ as $h_rAt => $yx0Dy) {
                if (!$yx0Dy) {
                    goto B3xPm;
                }
                if (isset($XSw4v[$h_rAt])) {
                    goto PWZuK;
                }
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto ge5k6;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\x3f";
                ge5k6:
                goto nCwbk;
                PWZuK:
                if (!($h_rAt < count($YAQt_) - 1)) {
                    goto LT2vN;
                }
                $YAQt_[$h_rAt] = $yx0Dy . "\x3a\137\x74\x6a" . $h_rAt;
                $XSw4v["\x3a" . "\x5f\x74\152" . $h_rAt] = $XSw4v[$h_rAt];
                unset($XSw4v[$h_rAt]);
                LT2vN:
                nCwbk:
                B3xPm:
                Xc2nj:
            }
            r75iI:
            $i5sHC = implode('', $YAQt_);
            if (!(strpos($i5sHC, "\x3f") !== false)) {
                goto h9hOs;
            }
            E("\xe9\xa2\204\345\xa4\204\347\220\206\345\217\x82\346\x95\xb0\xe6\225\260\351\x87\x8f\344\270\215\344\xb8\200\xe8\207\xb4\61\60\357\274\201");
            h9hOs:
            $ry0T9 = explode("\72", $i5sHC);
            $C2oQ2 = false;
            foreach ($XSw4v as $BA181 => $barO2) {
                if (!is_numeric($BA181)) {
                    goto Z2WjJ;
                }
                $C2oQ2 = true;
                Z2WjJ:
                rjs2x:
            }
            f8pX2:
            if (!$C2oQ2) {
                goto C8Y5p;
            }
            E("\351\242\204\xe5\xa4\x84\xe7\220\206\xe5\217\202\346\x95\260\346\225\260\xe9\207\217\xe4\xb8\x8d\xe4\270\x80\350\x87\xb4\x31\61\xef\xbc\201");
            C8Y5p:
            $i5sHC = "\167\x68\145\162\145\40" . $i5sHC;
            oNJpB:
            $o5ozR = "\x44\x45\x4c\105\x54\105\40\106\122\117\x4d\x20{$xkJ01}\40{$i5sHC}";
            if (!$Nl_y3) {
                goto GebV9;
            }
            echo $o5ozR . PHP_EOL;
            print_r($XSw4v);
            die;
            GebV9:
            $jyD6n = $YFmXg->prepare($o5ozR);
            $jyD6n->execute($XSw4v);
            $eFnND = $jyD6n->rowCount();
            $this->where = '';
            $this->field = "\x2a";
            $this->bind = array();
            $this->join = null;
            $this->groupby = null;
            $this->having = null;
            $this->orderby = null;
            $this->limit = null;
            $this->forupdate = null;
            $this->findone = false;
            $this->tableid = null;
            $this->table = null;
            $this->format = [];
            $this->currentpage = null;
            $this->pagesize = null;
            $this->pagelen = null;
            $this->data = null;
            $this->rules = null;
            $this->ruleresult = null;
            $this->linker = null;
            $this->linkerbind = [];
            $this->keyword = null;
            $this->keyword_array = [];
            $this->match = null;
            $this->matchtype = null;
            $this->link = [];
            if ($eFnND > 0) {
                goto vqchG;
            }
            if ($eFnND == 0) {
                goto xCtYw;
            }
            return false;
            goto EJsej;
            vqchG:
            return $eFnND;
            goto EJsej;
            xCtYw:
            return true;
            EJsej:
        }
        public function verify($I6Fah = false)
        {
            $D_uBL = $this->rules;
            if (!$D_uBL) {
                goto UCf4g;
            }
            foreach ($D_uBL as $vUVC5 => $barO2) {
                if (is_array($I6Fah)) {
                    goto Eguem;
                }
                $DHGS_ = $I6Fah;
                goto pukyV;
                Eguem:
                $DHGS_ = $I6Fah[$vUVC5] ?? '';
                pukyV:
                foreach ($barO2 as $rMCiT => $O3Gw3) {
                    if (method_exists($this, $rMCiT)) {
                        goto r5_hH;
                    }
                    if (!(count($O3Gw3) != 2)) {
                        goto Zqr_t;
                    }
                    E("\350\x87\252\xe5\xae\x9a\xe4\xb9\x89\350\247\x84\345\210\231\345\277\205\xe9\241\273\xe4\270\272\344\xb8\xa4\344\xb8\xaa\xe5\x8d\x95\xe5\x85\x83\347\232\x84\347\264\242\xe5\xbc\x95\xe6\x95\xb0\347\xbb\x84\x2c\xe7\254\xac\344\270\x80\xe4\270\252\xe5\215\x95\345\205\x83\344\270\272\xe6\255\xa3\345\210\x99\xe8\247\x84\xe5\x88\231\357\274\214\xe7\xac\254\344\xba\x8c\344\xb8\xaa\xe5\215\225\345\205\x83\344\270\272\xe9\224\x99\xe8\257\xaf\346\x8f\x90\xe7\xa4\272\xe6\x96\207\xe6\234\254");
                    Zqr_t:
                    if (preg_match($O3Gw3[0], $DHGS_)) {
                        goto IqpPK;
                    }
                    $Y6y1H["\146\151\x65\154\x64"] = $vUVC5;
                    $Y6y1H["\155\x65\x73\x73\141\x67\145"] = $O3Gw3[1];
                    return $Y6y1H;
                    IqpPK:
                    goto kWTRl;
                    r5_hH:
                    if ($rMCiT == "\x6c\145\156\147\x74\150") {
                        goto NmPCd;
                    }
                    if ($rMCiT == "\x70\x61\x73\163\167\x6f\162\144") {
                        goto vTULp;
                    }
                    $j51uE = call_user_func_array(array($this, $rMCiT), [$DHGS_]);
                    if (!($j51uE === false)) {
                        goto epg6Z;
                    }
                    $Y6y1H["\146\x69\145\154\x64"] = $vUVC5;
                    $Y6y1H["\155\x65\x73\163\141\147\x65"] = $O3Gw3;
                    return $Y6y1H;
                    epg6Z:
                    goto VwwVU;
                    vTULp:
                    if (!(count($O3Gw3) != 2)) {
                        goto vfFvu;
                    }
                    E("\x6c\145\156\147\x74\x68\xe8\247\x84\xe5\x88\231\xe5\xbf\205\xe9\xa1\273\344\270\xba\xe4\270\xa4\344\xb8\xaa\345\x8d\225\345\x85\x83\347\x9a\204\xe7\xb4\xa2\xe5\274\225\xe6\x95\260\xe7\xbb\x84");
                    vfFvu:
                    $j51uE = call_user_func_array(array($this, $rMCiT), [$DHGS_, $O3Gw3[0]]);
                    if (!($j51uE === false)) {
                        goto axIAa;
                    }
                    $Y6y1H["\x66\151\145\x6c\x64"] = $vUVC5;
                    $Y6y1H["\155\x65\x73\163\141\147\x65"] = $O3Gw3[1];
                    return $Y6y1H;
                    axIAa:
                    VwwVU:
                    goto nLoRU;
                    NmPCd:
                    if (!(count($O3Gw3) != 3)) {
                        goto J5Bkr;
                    }
                    E("\x6c\x65\x6e\x67\164\150\350\xa7\204\345\210\x99\345\277\x85\xe9\xa1\xbb\344\270\xba\344\xb8\211\344\xb8\252\xe5\215\x95\345\x85\203\xe7\x9a\204\347\264\242\xe5\xbc\225\346\x95\260\347\273\x84");
                    J5Bkr:
                    $j51uE = call_user_func_array(array($this, $rMCiT), [$DHGS_, $O3Gw3[0], $O3Gw3[1]]);
                    if (!($j51uE === false)) {
                        goto SsiMN;
                    }
                    $Y6y1H["\x66\x69\x65\154\x64"] = $vUVC5;
                    $Y6y1H["\x6d\x65\163\163\141\x67\145"] = $O3Gw3[2];
                    return $Y6y1H;
                    SsiMN:
                    nLoRU:
                    kWTRl:
                    f1tIr:
                }
                CGOHx:
                EwRpw:
            }
            T6kx7:
            return false;
            UCf4g:
        }
        public function rule($I6Fah = false)
        {
            $D_uBL = $this->rules;
            if (!$D_uBL) {
                goto mF54l;
            }
            foreach ($D_uBL as $rMCiT => $O3Gw3) {
                if (isset($I6Fah[$rMCiT])) {
                    goto oFZ_R;
                }
                $fVqUS = $O3Gw3;
                $YDVui = explode("\174", $fVqUS);
                $u2A9e = $YDVui[0];
                $RsXN5 = [];
                $meDKE = $YDVui[1];
                if (!(strpos($u2A9e, "\72") !== false)) {
                    goto fA6X3;
                }
                $Fq4s0 = explode("\x3a", $u2A9e);
                $u2A9e = $Fq4s0[0];
                $RsXN5 = $Fq4s0[1];
                $RsXN5 = explode("\x2c", $RsXN5);
                fA6X3:
                if (method_exists($this, $u2A9e)) {
                    goto qjA_j;
                }
                E("\xe6\x9c\252\347\237\xa5\350\247\204\345\x88\231\xef\274\232{$u2A9e}");
                goto PDIIx;
                qjA_j:
                $Y6y1H["\x66\x69\x65\154\144"] = $rMCiT;
                $Y6y1H["\x6d\x65\x73\x73\141\x67\145"] = $meDKE;
                return $Y6y1H;
                PDIIx:
                goto lFx12;
                oFZ_R:
                $DHGS_ = $I6Fah[$rMCiT];
                $fVqUS = $O3Gw3;
                $YDVui = explode("\174", $fVqUS);
                $u2A9e = $YDVui[0];
                $RsXN5 = [];
                $meDKE = $YDVui[1];
                if (!(strpos($u2A9e, "\x3a") !== false)) {
                    goto FKOvy;
                }
                $Fq4s0 = explode("\x3a", $u2A9e);
                $u2A9e = $Fq4s0[0];
                $RsXN5 = $Fq4s0[1];
                $RsXN5 = explode("\x2c", $RsXN5);
                FKOvy:
                if (method_exists($this, $u2A9e)) {
                    goto yOZfp;
                }
                E("\xe6\234\xaa\xe7\237\xa5\xe8\xa7\204\xe5\210\231\357\xbc\x9a{$u2A9e}");
                goto glgSN;
                yOZfp:
                array_unshift($RsXN5, $DHGS_);
                if (!(call_user_func_array(array($this, $u2A9e), $RsXN5) === false)) {
                    goto cCBRs;
                }
                $Y6y1H["\146\x69\145\154\144"] = $rMCiT;
                $Y6y1H["\155\145\x73\163\141\x67\145"] = $meDKE;
                return $Y6y1H;
                cCBRs:
                glgSN:
                lFx12:
                Z1kNL:
            }
            I8YND:
            return false;
            mF54l:
        }
        public function isstring($DHGS_)
        {
            return preg_match("\57\x5e\x5b\x5c\x78\173\64\145\60\60\175\55\x5c\170\173\x39\x66\141\65\x7d\x61\x2d\x7a\101\55\132\60\x2d\71\137\135\x2b\x24\57\x75", $DHGS_) ? true : false;
        }
        public function notnull($DHGS_)
        {
            return strlen((string) $DHGS_) > 0 ? true : false;
        }
        public function isnumber($DHGS_)
        {
            return preg_match("\x2f\x5e\x5b\x30\x2d\x39\x5d\x2b\44\57", $DHGS_) ? true : false;
        }
        public function length($DHGS_, $LMn4d, $p0yrr)
        {
            $ogplu = $this->cn_strlen($DHGS_);
            return $ogplu >= $LMn4d && $ogplu <= $p0yrr ? true : false;
        }
        public function password($DHGS_, $iH31H = 2)
        {
            switch ($iH31H) {
                case 1:
                    return preg_match("\x2f\136\50\x3f\x3d\x2e\52\77\x5b\141\55\172\x41\x2d\x5a\x5d\x29\50\77\75\x2e\52\77\x5b\x30\x2d\71\135\x29\56\173\x36\54\x7d\44\x2f", $DHGS_) ? true : false;
                case 2:
                    return preg_match("\57\x5e\x28\x3f\75\x2e\52\77\133\x61\55\172\x41\x2d\x5a\x5d\51\x28\77\x3d\56\x2a\77\x5b\x30\55\71\x5d\51\x28\77\75\56\52\77\133\x23\77\x21\100\x24\45\136\x26\x2a\55\x5d\x29\x2e\x7b\x36\x2c\175\x24\57", $DHGS_) ? true : false;
                case 3:
                    return preg_match("\57\x5e\x28\x3f\75\56\52\77\133\x41\x2d\x5a\x5d\x29\50\x3f\75\x2e\x2a\77\133\141\x2d\172\135\x29\x28\x3f\x3d\56\x2a\x3f\x5b\60\x2d\x39\135\51\50\77\75\x2e\52\77\x5b\43\77\x21\x40\x24\x25\x5e\46\52\x2d\135\x29\56\173\66\x2c\175\44\x2f", $DHGS_) ? true : false;
            }
            jjhvb:
            wQT95:
        }
        public function phone($DHGS_)
        {
            return preg_match("\57\136\50\50\x31\63\x5b\60\x2d\x39\135\x29\174\x28\61\64\x28\60\174\133\x35\55\x37\x5d\174\x39\51\x29\x7c\x28\x31\x35\x28\133\60\55\63\135\x7c\133\65\x2d\x39\x5d\51\x29\x7c\x28\x31\x36\50\62\x7c\133\x35\x2d\x37\135\51\x29\174\x28\x31\x37\x5b\x30\x2d\x38\x5d\x29\x7c\50\x31\x38\x5b\x30\55\71\x5d\51\x7c\50\61\71\x28\x5b\x30\x2d\63\135\174\133\x35\55\x39\135\51\51\51\134\x64\x7b\x38\x7d\44\57", $DHGS_) ? true : false;
        }
        public function card($OLq3P)
        {
            if (strlen((string) $OLq3P) == 18) {
                goto AmecZ;
            }
            if (strlen((string) $OLq3P) == 15) {
                goto EMQvd;
            }
            return false;
            goto YZDgP;
            AmecZ:
            $qtwk6 = substr($OLq3P, 0, 17);
            if ($this->verify_cncard($qtwk6) != strtoupper(substr($OLq3P, 17, 1))) {
                goto rGVIJ;
            }
            return true;
            goto Cg1Nk;
            rGVIJ:
            return false;
            Cg1Nk:
            goto YZDgP;
            EMQvd:
            if (array_search(substr($OLq3P, 12, 3), array("\71\x39\x36", "\x39\x39\x37", "\x39\71\70", "\71\x39\x39")) !== false) {
                goto v1ubc;
            }
            $LGHgs = substr($OLq3P, 0, 6) . "\x31\x39" . substr($OLq3P, 6, 9);
            goto j_rrZ;
            v1ubc:
            $LGHgs = substr($OLq3P, 0, 6) . "\x31\x38" . substr($OLq3P, 6, 9);
            j_rrZ:
            $LGHgs = $LGHgs . $this->verify_cncard($LGHgs);
            if (!(strlen((string) $LGHgs) != 18)) {
                goto sGCb3;
            }
            return false;
            sGCb3:
            $qtwk6 = substr($LGHgs, 0, 17);
            if ($this->verify_cncard($qtwk6) != strtoupper(substr($LGHgs, 17, 1))) {
                goto GgFTK;
            }
            return true;
            goto m2sOe;
            GgFTK:
            return false;
            m2sOe:
            YZDgP:
        }
        private function verify_cncard($qtwk6)
        {
            if (!(strlen((string) $qtwk6) != 17)) {
                goto YPA3O;
            }
            return false;
            YPA3O:
            $qVQ1i = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            $nQfD5 = array("\61", "\60", "\x58", "\x39", "\x38", "\67", "\66", "\65", "\64", "\x33", "\x32");
            $wAE8J = 0;
            $Sh78e = 0;
            FyYfW:
            if (!($Sh78e < strlen((string) $qtwk6))) {
                goto jt4p_;
            }
            $wAE8J += substr($qtwk6, $Sh78e, 1) * $qVQ1i[$Sh78e];
            Fc9Ym:
            $Sh78e++;
            goto FyYfW;
            jt4p_:
            $CxAjc = $wAE8J % 11;
            $m22Rb = $nQfD5[$CxAjc];
            return $m22Rb;
        }
        public function email($DHGS_)
        {
            return preg_match("\x2f\136\x5b\101\x2d\132\x61\55\172\60\x2d\x39\135\53\x28\133\56\137\x5c\55\134\x2b\135\52\133\101\x2d\132\141\55\x7a\x30\55\71\x5d\x2b\x29\52\x40\x28\x5b\x41\55\132\141\55\x7a\x30\x2d\x39\55\x5d\x2b\134\x2e\x29\53\133\x41\55\132\141\55\x7a\x30\x2d\x39\x5d\x2b\44\x2f", $DHGS_) ? true : false;
        }
        private function cn_strlen($bcdgI)
        {
            return $bcdgI = mb_strlen($bcdgI, "\165\x74\146\x2d\x38");
        }
    }
}
