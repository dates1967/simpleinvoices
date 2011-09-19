<?php

function smarty_function_online_payment_link($params, &$smarty) {
    global $LANG;
    global $config;
		global $siUrl;
    $domain_id = domain_id::get($params['domain_id']);

    $url = getURL();
    if (in_array("paypal",explode(",", $params['type'])))
    {

        $link = "<a 
            href=\"https://www.paypal.com/xclick/?business=".urlencode($params['business'])."&item_name=".urlencode($params['item_name'])."&invoice=".urlencode($params['invoice'])."&amount=".urlencode(number_format($params['amount'], 2, '.', ''))."&currency_code=".urlencode($params['currency_code'])."&notify_url=".urlencode($params['notify_url'])."&return=".urlencode($params['return_url'])."&no_shipping=1&no_note=1&custom=domain_id:".urlencode($domain_id)."; \">";

        if($params['include_image'] == "true")
        {
            $link .= "<img border='0' src='".urlsafe($url)."/images/common/pay_with_paypal.gif'/>";
        } else {
            $link .= htmlsafe($params['link_wording']);
        } 

        $link .= "</a>";

        echo $link;
    }

    if (in_array("eway_shared",explode(",", $params['type'])))
    {

        $link = "<a 
            href=\"https://www.paypal.com/xclick/?business=".urlencode($params['business']."
            &item_name=".urlencode($params['item_name'])."&invoice=".urlencode($params['invoice'])."
            &amount=".urlencode(number_format($params['amount'], 2, '.', ''))."&currency_code=".$params['currency_code'])."
            &return=http://vcsweb.com.au&no_shipping=1&no_note=1\">";

        if($params['include_image'] == "true")
        {
            $link .= "<img border='0' src='".urlsafe($url)."/images/common/pay_with_eway.gif'/>";
        } else {
            $link .= htmlsafe($params['link_wording']);
        } 

        $link .= "</a>";

        echo $link;
    }

    if (in_array("ach",explode(",", $params['type'])))
    {

        $today = date('Y-m-d');
        $datetime1 = new DateTime('0001-01-01');
        $datetime2 = new DateTime($today);
        $interval = $datetime1->diff($datetime2);
        $seconds =  $interval->format('%a') * 24 * 60 * 60;
        //get biller secure trans key here
        $hash = hash_hmac('md5',"APILOGINID | 10 | 1.0 | 5.00 | 634094514514687490 | 100055", "SECURETRANSACTIONKEY") ;

        $link = "<a 
            href=\"https://swp.paymentsgateway.net/default.aspx?pg_api_login_id=".urlencode($params['business'])."&pg_billto_postal_name_first=".$hah."&pg_billto_postal_name_last=".$hash."&pg_transaction_type=".$hash."&pg_version_number=".$hash."&pg_total_amount=".urlencode(number_format($params['amount'], 2, '.', ''))."&pg_utc_time=".$seconds."&pg_transaction_order_number=".$hash."&pg_ts_hash=".$hash."aaitem_name=".urlencode($params['item_name'])."&invoice=".urlencode($params['invoice'])."&amount=".urlencode(number_format($params['amount'], 2, '.', ''))."&currency_code=".urlencode($params['currency_code'])."&notify_url=".urlencode($params['notify_url'])."&return=".urlencode($params['return_url'])."&no_shipping=1&no_note=1&custom=domain_id:".urlencode($domain_id)."; \">";

        if($params['include_image'] == "true")
        {
            $link .= "<img border='0' src='".urlsafe($url)."/images/common/pay_with_ach.gif'/>";
        } else {
            $link .= htmlsafe($params['link_wording']);
        } 

        $link .= "</a>";

        echo $link;
    }

}

?>
