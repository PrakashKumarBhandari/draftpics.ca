<?php
/**
 * WooCommerce Unlimited Upsell.
 *
 * @package   WooCommerce_Unlimited_Upsell_List
 * @author    KungWoo
 * @license   GPL-2.0+
 * @link      http://kungwoo.com
 * @copyright 2016 KungWoo
 */

/**
 *-----------------------------------------
 * Do not delete this line
 * Added for security reasons: http://codex.wordpress.org/Theme_Development#Template_Files
 *-----------------------------------------
 */
defined('ABSPATH') or die("Direct access to the script does not allowed");
/*-----------------------------------------*/


?>


<div class="wrap wooup-offer-edit-wrapper">

  <h2>
    <a href="<?php echo admin_url('admin.php?page=' . $this->plugin_slug . '-offers-view') ?>" class="page-title-action">&larr; <?php esc_attr_e('Back', 'woocommerce-unlimited-upsell');?></a>
    <?php echo $page_title;?>
    <?php if(isset($id)){?>
    <a href="<?php echo admin_url('admin.php?page=' . $this->plugin_slug . '-offer-edit') ?>" class="page-title-action"><?php esc_attr_e('Add New', 'woocommerce-unlimited-upsell');?></a>
    <?php }?>
  </h2>

<form method="post" action="">
<input type="hidden" name="action" value="update">
<input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div id="titlediv">
                  <div id="titlewrap">
                    <label class="screen-reader-text" id="title-prompt-text" for="title"><?php esc_attr_e( 'Offer Name', 'woocommerce-unlimited-upsell' ); ?></label>
                    <input type="text" name="name" size="30" value="<?php echo isset($name) ? $name : ''; ?>" id="title" spellcheck="true" autocomplete="off" placeholder="<?php esc_attr_e( 'Offer Name', 'woocommerce-unlimited-upsell' ); ?>">
                  </div>
                </div>

                <div class="meta-box-sortables ui-sortable1">

                    <div class="postbox">
                      <h2 class="hndle"><span><?php esc_attr_e('Conditions', 'woocommerce-unlimited-upsell');?></span></h2>
                      <div class="inside">
                        <p><?php esc_attr_e( 'Offer will be triggered only if all enabled conditions are matched.', 'woocommerce-unlimited-upsell' ); ?></p>
                        <div class="wooup-conditions-wrapper">
                          <div class="wooup-condition-wrapper">
                            <label >
                              <input class="wooup-condition-status" name="conditions[0][status]" type="checkbox" value="1" <?php echo ( isset($conditions[0]['status']) && $conditions[0]['status'] == 1) ? 'checked' : ''; ?>/>
                              <span><?php esc_attr_e( 'Available when cart total is in specific price range', 'woocommerce-unlimited-upsell' ); ?></span>
                            </label>

                            <fieldset>
                              <label >
                                <span><?php esc_attr_e( 'From', 'woocommerce-unlimited-upsell' ); ?> </span>
                                <input class="wooup-price" name="conditions[0][price_min]" type="text" value="<?php echo isset($conditions[0]['price_min']) ? $conditions[0]['price_min'] : ''; ?>" />
                              </label>
                              <label >
                                <span><?php esc_attr_e( 'To', 'woocommerce-unlimited-upsell' ); ?></span>
                                <input class="wooup-price" name="conditions[0][price_max]" type="text" value="<?php echo isset($conditions[0]['price_max']) ? $conditions[0]['price_max'] : ''; ?>" /> (<?php echo get_woocommerce_currency();?>)
                              </label>
                            </fieldset>

                          </div>

                          <div class="wooup-condition-wrapper">
                            <label >
                              <input class="wooup-condition-status" name="conditions[1][status]" type="checkbox" value="1" <?php echo ( isset($conditions[1]['status']) && $conditions[1]['status'] == 1) ? 'checked' : ''; ?> />
                              <span><?php esc_attr_e( 'Available between specific dates', 'woocommerce-unlimited-upsell' ); ?></span>
                            </label>

                            <fieldset>
                              <label >
                                <span><?php esc_attr_e( 'From', 'woocommerce-unlimited-upsell' ); ?> </span>
                                <input class="wooup-datepicker" name="conditions[1][date_start]" type="text" value="<?php echo isset($conditions[1]['date_start']) ? $conditions[1]['date_start'] : ''; ?>" placeholder="DD-MM-YYYY"/>
                              </label>
                              <label >
                                <span><?php esc_attr_e( 'To', 'woocommerce-unlimited-upsell' ); ?> </span>
                                <input class="wooup-datepicker" name="conditions[1][date_end]" type="text" value="<?php echo isset($conditions[1]['date_end']) ? $conditions[1]['date_end'] : ''; ?>"  placeholder="DD-MM-YYYY" />
                              </label>
                            </fieldset>

                          </div>

                          <div class="wooup-condition-wrapper">
                            <label >
                              <input class="wooup-condition-status" name="conditions[2][status]" type="checkbox" value="1" <?php echo ( isset($conditions[2]['status']) && $conditions[2]['status'] == 1) ? 'checked' : ''; ?> />
                              <span><?php esc_attr_e( 'Trigger offer if selected products are in customer cart', 'woocommerce-unlimited-upsell' ); ?></span>
                            </label>

                            <fieldset>

                                <select name="conditions[2][relation]">
                                  <option value="all" <?php echo ( isset($conditions[2]['relation']) && $conditions[2]['relation'] == 'all') ? 'selected' : ''; ?>>
                                    <?php esc_attr_e( 'All of them', 'woocommerce-unlimited-upsell' ); ?>
                                  </option>
                                  <option value="any" <?php echo ( isset($conditions[2]['relation']) && $conditions[2]['relation'] == 'any') ? 'selected' : ''; ?>>
                                    <?php esc_attr_e( 'Any of them', 'woocommerce-unlimited-upsell' ); ?>
                                  </option>
                                </select>


                              <input class="wooup-select-product" name="conditions[2][products]" type="hidden" value="<?php echo isset($conditions[2]['products']) ? $conditions[2]['products'] : ''; ?>" />

                            </fieldset>

                          </div>

                          <div class="wooup-condition-wrapper">
                            <label >
                              <input class="wooup-condition-status" name="conditions[3][status]" type="checkbox" value="1" <?php echo ( isset($conditions[3]['status']) && $conditions[3]['status'] == 1) ? 'checked' : ''; ?> />
                              <span><?php esc_attr_e( 'Available when quantity of items in cart is in specific range', 'woocommerce-unlimited-upsell' ); ?></span>
                            </label>

                            <fieldset>
                              <label >
                                <span><?php esc_attr_e( 'From', 'woocommerce-unlimited-upsell' ); ?></span>
                                <input type="number" placeholder="0" class="small-text" name="conditions[3][qty_min]" min="0" value="<?php echo isset($conditions[3]['qty_min']) ? $conditions[3]['qty_min'] : '0'; ?>" >
                              </label>
                              <label >
                                <span><?php esc_attr_e( 'To', 'woocommerce-unlimited-upsell' ); ?></span>
                                <input type="number" placeholder="0" class="small-text" name="conditions[3][qty_max]" min="0" value="<?php echo isset($conditions[3]['qty_max']) ? $conditions[3]['qty_max'] : '0'; ?>" >
                              </label>
                            </fieldset>
                          </div>
                            
                        <div class="wooup-condition-wrapper">
                            <label >
                              <input class="wooup-condition-status" name="conditions[4][status]" type="checkbox" value="1" <?php echo ( isset($conditions[4]['status']) && $conditions[4]['status'] == 1) ? 'checked' : ''; ?> />
                              <span><?php esc_attr_e( 'Trigger offer if products from that category are in customer cart', 'woocommerce-unlimited-upsell' ); ?></span>
                            </label>

                            <fieldset>
                                <select name="conditions[4][relation]">
                                  <option value="all" <?php echo ( isset($conditions[4]['relation']) && $conditions[4]['relation'] == 'all') ? 'selected' : ''; ?>>
                                    <?php esc_attr_e( 'All of them', 'woocommerce-unlimited-upsell' ); ?>
                                  </option>
                                  <option value="any" <?php echo ( isset($conditions[4]['relation']) && $conditions[4]['relation'] == 'any') ? 'selected' : ''; ?>>
                                    <?php esc_attr_e( 'Any of them', 'woocommerce-unlimited-upsell' ); ?>
                                  </option>
                                </select>

                              <input class="wooup-select-category" name="conditions[4][categories]" type="hidden" value="<?php echo isset($conditions[4]['categories']) ? $conditions[4]['categories'] : ''; ?>" />
                            </fieldset>
                          </div> <!-- .category condition -->

                        </div><!-- .wooup-conditions-wrapper -->
                      </div><!-- .inside -->
                    </div><!-- .postbox -->

                    <div class="postbox">
                      <h2 class="hndle"><span><?php esc_attr_e('Text and Title', 'woocommerce-unlimited-upsell');?></span></h2>
                      <div class="inside">
                        <fieldset>
                            <input class="wooup-input-large" name="options[title]" type="text" placeholder="<?php esc_attr_e('Offer title', 'woocommerce-unlimited-upsell');?>" value="<?php echo isset($options['title']) ? $options['title'] : ''; ?>" />
                        </fieldset>
                        <fieldset>
                            <textarea class="wooup-advanced-editor" name="options[text]" placeholder="<?php esc_attr_e('Offer text', 'woocommerce-unlimited-upsell');?>"><?php echo isset($options['text']) ? $options['text'] : ''; ?></textarea>
                        </fieldset>
                      </div><!-- .inside -->
                    </div><!-- .postbox -->

                    <div class="postbox">
                      <h2 class="hndle"><span><?php esc_attr_e('Products', 'woocommerce-unlimited-upsell');?></span></h2>
                      <div class="inside">
                        <div class="wooup-products-wrapper">
                          <input  class="wooup-select-product-advanced" name="products" type="hidden" value="<?php echo isset($products) ? $products : ''; ?>" />
                        </div><!-- .wooup-products-wrapper -->
                      </div><!-- .inside -->
                    </div><!-- .postbox -->

                </div><!-- .meta-box-sortables -->

            </div><!-- post-body-content -->


            <div id="postbox-container-1" class="postbox-container">
              <div id="side-sortables" class="meta-box-sortables ui-sortable1">
                <div id="submitdiv" class="postbox">
                  <h2 class="hndle"><span><?php esc_attr_e('Settings', 'woocommerce-unlimited-upsell');?></span></h2>

                  <div class="inside">
                    <div class="submitbox" id="submitpost">
                      <div id="minor-publishing">
                        <div id="misc-publishing-actions">
                          <div class="misc-pub-section misc-pub-visibility">
                            <label>
                              <input name="is_active" type="checkbox" <?php echo ( isset($is_active) && $is_active == 1) ? 'checked' : ''; ?>> 
                              <span><?php esc_attr_e( 'Active', 'woocommerce-unlimited-upsell' ); ?></span>
                            </label>
                          </div><!-- .misc-pub-section -->
                          <div class="misc-pub-section misc-pub-visibility">
                            <label>
                              <span><?php esc_attr_e( 'Priority', 'woocommerce-unlimited-upsell' ); ?></span> 
                              <input type="number" placeholder="0" class="small-text" name="priority" min="0" value="<?php echo isset($priority) ? $priority : '0'; ?>" >
                            </label>
                          </div><!-- .misc-pub-section -->
                        </div>
                        <div class="clear"></div>
                      </div><!-- #minor-publishing -->

                      <div id="major-publishing-actions">
                        <?php if(isset($id)){?>
                        <div id="delete-action">
                          <a class="submitdelete deletion" onclick="return confirm('<?php esc_attr_e( 'Are you sure you want to delete this offer?', 'woocommerce-unlimited-upsell' ); ?>');" href="<?php echo admin_url('admin.php?page=' . $this->plugin_slug . '-offers-view') . '&action=delete&id=' . $id ;?>" ><?php esc_attr_e( 'Delete', 'woocommerce-unlimited-upsell' ); ?></a>
                        </div>
                        <?php }?>

                        <div id="publishing-action">
                          <input name="save" type="submit" class="button button-primary button-large" id="publish" value="<?php isset($id) ? esc_attr_e( 'Update', 'woocommerce-unlimited-upsell' ) : esc_attr_e( 'Save', 'woocommerce-unlimited-upsell' ) ; ?>">
                        </div>
                        <div class="clear"></div>
                      </div><!-- #major-publishing-actions -->
                    </div><!-- .submitbox -->
                  </div><!-- .inside -->
                  
                </div><!-- #submitdiv -->
              </div>
            </div><!-- .postbox-container -->


        </div><!-- #post-body .metabox-holder .columns-1 -->

        <br class="clear">
    </div><!-- #poststuff -->

</form>

</div><!-- .wrap -->
