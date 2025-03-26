/**
* Add this code to your functions.php file
* It will add a new (disabled) option to the state dropdown fields forcing the user to select an option.
**/
add_action( 'wp_footer', 'gl_disable_default_state_option' );
function gl_disable_default_state_option() {
    if ( is_checkout() ) : ?>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
              // Function to add a placeholder to a select element if it's not already there.
              function addPlaceholder(selector) {
                  var $select = $(selector);
                  if ($select.length) {
                      // If no placeholder exists, prepend one.
                      if ($select.find('option[data-placeholder]').length === 0) {
                          // Remove any existing 'selected' attributes from other options.
                          $select.find('option').removeAttr('selected');
                          // Prepend our disabled, selected placeholder option.
                          $select.prepend('<option value="" data-placeholder="true" disabled selected>Please choose an option</option>');
                      }
                  }
              }
              
              // Apply the placeholder to both billing and shipping state fields.
              addPlaceholder('#billing_state');
              addPlaceholder('#shipping_state');
          });
        </script>
    <?php endif;
}
