<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Chintantable {
    private $CI;
    function __construct() {
        // Assign by reference with "&" so we don't create a copy
        $this->CI = & get_instance();
    }
    public function query($pageno = 1, $maxlength = 20, $orderby = "", $orderorder = "", $search = "", $elements, $from, $where = " WHERE 1 ", $group = "", $having = "", $order = "", $baseurl = "http://localhost/puneetdemo/index.php/site/index", $options = array()) {
        //        QUERY
        //            1. SELECT
        //            2. FROM
        //            3. WHERE
        //            4. GROUP
        //            5. HAVING
        //            6. ORDER
        //            7. LIMIT
        //        $element->field;
        //        $element->alias;
        //        $element->sort;
        //        $element->filter;
        //        $element->filterfunction;
        if ($pageno == "") {
            $pageno = 1;
        }
        $pageno = intval($pageno);
        if ($maxlength == "") {
            $maxlength = 20;
        }
        $maxlength = intval($maxlength);
        $selectquery = "SELECT ";
        $fromquery = " " . $from . " ";
        $wherequery = " " . $where . " AND ( ";
        $groupquery = " " . $group . " ";
        $havingquery = " " . $having . " ";
        $orderquery = " ORDER BY ";
        $maxlength = intval($maxlength);
        $startingfrom = ($pageno - 1) * $maxlength;
        $searchquery = "";
        $limitquery = " LIMIT $startingfrom,$maxlength";
        foreach ($elements as $element) {
            $selectquery.= " " . $element->field . " ";
            if (isset($element->alias) && $element->alias != "") {
                $selectquery.= " AS `" . $element->alias . "` ";
            }
            $selectquery.= ", ";
            if (isset($element->filter) && $element->filter != "") {
                $wherequery.= " `" . $element->field . "` " . $element->filterfunction . " '" . $element->filter . "' AND ";
            }
            if (isset($element->sort) && $orderby != "" && $orderorder != "" && ($orderby == $element->alias || $orderby == $element->field)) {
                $orderquery.= " `" . $orderby . "` " . $orderorder . ", ";
                $element->sort = $orderorder;
            }
            if ($search != "") {
                $searchquery.= " " . $element->field . " LIKE '%" . $search . "%' OR ";
            }
        }
        $searchquery.= " 0 ";
        $selectquery.= " 1 ";
        if ($search == "") {
            $wherequery.= " 1 ) ";
        } else {
            $wherequery.= " 1 ) AND ($searchquery)";
        }
        $orderquery.= " 1 ";
        $return = new stdClass();
        $return->query = $selectquery . $fromquery . $wherequery . $groupquery . $havingquery . $orderquery . $limitquery;
        $return->queryresult = $this->CI->db->query($return->query)->result();
        $return->totalvalues = $this->CI->db->query("SELECT count(" . $elements[0]->field . ") as `totalcount` " . $fromquery . $wherequery . $groupquery . $havingquery)->row();
        $return->totalvalues = intval($return->totalvalues->totalcount);
        $return->pageno = $pageno;
        $return->lastpage = ceil($return->totalvalues / $maxlength);
        $return->elements = $elements;
        $return->from = $from;
        $return->where = $where;
        $return->group = $group;
        $return->having = $having;
        $return->search = $search;
        $return->startingfrom = $startingfrom;
        $return->maxlength = $maxlength;
        $return->options = $options;
        return $return;
    }
    public function createpagination() {
        echo '<nav class="chintantablepagination"><ul class="pagination"></ul></nav>';
    }
    public function createsearch($title = "", $description = "") {
        echo '<div class="row">
                <div class="col-md-9">
                    <h4>' . $title . '</h4>
                    <h6 >' . $description . '</h6>
                </div>
                <div class="col-md-3">
                <select class="maxrow form-control" style="
    float: left;  width: 76px;
"><option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>
                    <div class="input-group">
                        <input type="text" class="form-control chintantablesearch" placeholder="Search">
                        <span class="input-group-btn">
        <button class="btn btn-default chintantablesearchgo" type="button">Go!</button>
      </span>
                    </div>
                </div>
            </div>
            <div class="loader" style="
    width: 100%;
    position: fixed;  background: rgba(255, 31, 31, 0.431373);
    z-index: 1;  height: 100%;  top: 0px;  left: 0px;  padding: 10%;  font-size: 51px;  color: white;  text-align: center;
"> Loading </div>';
    }
    public function gethighstockjson($element1, $element2, $from, $where = "", $group = "", $having = "", $order = "", $limit = "", $otherselect = "") {
        if ($where == "") {
            $where = " WHERE 1 ";
        }
        $query = "SELECT CONCAT(UNIX_TIMESTAMP($element1),'000') AS `0`, $element2 as `1` $otherselect  $from $where $group $having $order $limit";
        return $this->CI->db->query($query)->result_array();
    }
     public function sendGcm($gcm, $token, $title, $message, $image = '', $icon = '', $link = '')
    {
        define('API_ACCESS_KEY', $gcm);
        $registrationIds = array($token);
        // prep the bundle
        $msg = array(
            'message' => $message,
            'title' => $title,
            'vibrate' => 1,
            'sound' => 1,

        );

        if ($image != '') {
            $msg['image'] = $image;
            $msg['style'] = 'picture';
            $msg['picture'] = $image;
        }
        if ($icon != '') {
            $msg['icon'] = $icon;
        }

        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => $msg,
        );

        $headers = array(
            'Authorization: key='.API_ACCESS_KEY,
            'Content-Type: application/json',
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
    }

    public function sendApns($apnsPem, $apnsPassphase, $token, $message, $link)
    {

        // Put your device token here (without spaces):
        $deviceToken = $token;

        // Put your private key's passphrase here:
        $passphrase = $apnsPassphase;

        // Put your alert message here:
        $message = $message;

        ////////////////////////////////////////////////////////////////////////////////

        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', FCPATH.'config/'.$apnsPem);
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        $fp = stream_socket_client(
            'ssl://gateway.sandbox.push.apple.com:2195', $err,
            $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp) {
            exit("Failed to connect: $err $errstr".PHP_EOL);
        }

        //echo 'Connected to APNS' . PHP_EOL;

        // Create the payload body
        $body['aps'] = array(
            'alert' => $message,
            'sound' => 'default',
            );

        // Encode the payload as JSON
        $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0).pack('n', 32).pack('H*', $deviceToken).pack('n', strlen($payload)).$payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        // Close the connection to the server
        fclose($fp);
    }
}
/* End of file Someclass.php */
