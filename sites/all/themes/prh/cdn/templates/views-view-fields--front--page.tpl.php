<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 * 
 * 
 */
?>

<?php 
  $date_fc_id = $fields['field_on_sale_date']->raw;
  $date_fc = entity_load('field_collection_item', array($date_fc_id));
  $date_fc_value = array_shift($date_fc);

  $date = $date_fc_value->field_date['und'][0]['value'] . " " .
      $date_fc_value->field_timezone['und'][0]['value'];
  $parsed_on_sale_date = date("M d, Y",strtotime($date));
?>

<div class="prh-content-left">
  <?php print $fields['field_thumbnail']->content; ?>
</div>
<div class="prh-content-right">
  <div class="field field-label-inline clearfix ">
    <div class="field-label">Title:&nbsp;</div>
    <div class="field-items"><?php print $fields['title']->content; ?></div>
  </div>
  <?php if (isset($fields['field_subtitle']->content)) : ?>
  <div class="field field-label-inline clearfix ">
    <div class="field-label">Subtitle:&nbsp;</div>
    <div class="field-items"><?php print $fields['field_subtitle']->content; ?></div>
  </div>
  <?php endif; ?>
  <div class="field field-label-inline clearfix ">
    <div class="field-label">Author:&nbsp;</div>
    <div class="field-items"><?php print $fields['field_author']->content; ?></div>
  </div>
  <?php if (isset($fields['field_format']->content)) : ?>
  <div class="field field-label-inline clearfix ">
    <div class="field-label">Format:&nbsp;</div>
    <div class="field-items"><?php print $fields['field_format']->content; ?></div>
  </div>
  <?php endif; ?>
  <?php if (isset($fields['field_on_sale_date']->content)) : ?>
  <div class="field field-label-inline clearfix ">
    <div class="field-label">On sale date:&nbsp;</div>
    <div class="field-items"><?php print $parsed_on_sale_date; ?></div>
  </div>
  <?php endif; ?>
  <?php if (isset($fields['field_price']->content)) : ?>
  <div class="field field-label-inline clearfix ">
    <div class="field-label">Price:&nbsp;</div>
    <div class="field-items"><?php print $fields['field_price']->content; ?></div>
  </div>
  <?php endif; ?>
  <?php if (isset($fields['body']->content)) : ?>
  <div class="field field-label-above">
    <div class="field-label">Description:&nbsp;</div>
    <div class="field-items"><?php print decode_entities($fields['body']->content); ?></div>
  </div>
  <?php endif; ?>
</div>