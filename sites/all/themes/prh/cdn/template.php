<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
function prh_preprocess_node(&$variables) {
 $date_fc_id = $variables['field_on_sale_date'][0]['value'];
 $date_fc = entity_load('field_collection_item', array($date_fc_id));
 $date_fc_value = array_shift($date_fc);
 
 $date = $date_fc_value->field_date['und'][0]['value'] . " " .
     $date_fc_value->field_timezone['und'][0]['value'];
 $variables['parsed_on_sale_date'] = date("M d, Y",strtotime($date));
 $variables['decoded_body'] = decode_entities($variables['body'][0]['value']);
}