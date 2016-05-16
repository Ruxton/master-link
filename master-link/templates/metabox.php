<div class="wrap">
  <input type="hidden" name="metabox_noncename" id="metabox_noncename" value="<?php wp_create_nonce( plugin_basename(__FILE__) ) ?>" />
  <div id="meta_inner">
    <p>Add links to remote stores below.  UPC will be used for microfromats on the page template &amp; searching for links in stores you haven't added.</p>
    <p><label for="master_link_upc"><?php _e("UPC") ?></label><input type="text" name="master_link_upc" id="master_link_upc" value="<?php echo $upc; ?>" class="large-text"/></p>
    <span class="add button-primary alignright"><?php _e('Add Link'); ?></span>
    <table class="form-table striped">
      <thead>
        <tr>
          <th><?php _e('Service') ?></td>
          <th><?php _e('ID/Link') ?></td>
          <th><?php _e('Example') ?></td>
          <th><?php _e('Actions') ?></td>
        </tr>
      </thead>
      <tbody id="template" style="display: none">
        <?php $serviceCount = "REPLACETHISID"; include $template_path.'metabox_row.php'; ?>
      </tbody>
      <tbody id="here">
        <?php
        $serviceCount = 0;

        foreach($app_links as $service_id => $value) {
          $validation = $this->services[$service_id]['validation'];
          $validation_error = $this->services[$service_id]['validation-error'];
          include $template_path.'metabox_row.php';
          $serviceCount++;
        }
        ?>
      </tbody>
      <tfoot>
      </tfoot>
    </table>

    <script>
      jQuery(document).ready(function() {
          jQuery(".add").click(function() {
              template = jQuery("#template tr")[0].cloneNode(true)
              elements = jQuery('.master_link_row').length
              template.innerHTML = template.innerHTML.replace(/REPLACETHISID/g,elements);
              jQuery('#here').prepend(template);
              return false;
          });
          jQuery(".remove").live('click', function() {
              jQuery(this).parent().remove();
          });
      });
    </script>
  </div>
</div>
