<?php
class ModelCheckoutOrder extends Model {
	public function addOrder($data) {

                    $this->load->model('vendor/lts_product');
                    $vendor_products = array();
                
		$this->db->query("INSERT INTO `" . DB_PREFIX . "order` SET invoice_prefix = '" . $this->db->escape($data['invoice_prefix']) . "', store_id = '" . (int)$data['store_id'] . "', store_name = '" . $this->db->escape($data['store_name']) . "', store_url = '" . $this->db->escape($data['store_url']) . "', customer_id = '" . (int)$data['customer_id'] . "', customer_group_id = '" . (int)$data['customer_group_id'] . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', custom_field = '" . $this->db->escape(isset($data['custom_field']) ? json_encode($data['custom_field']) : '') . "', payment_firstname = '" . $this->db->escape($data['payment_firstname']) . "', payment_lastname = '" . $this->db->escape($data['payment_lastname']) . "', payment_company = '" . $this->db->escape($data['payment_company']) . "', payment_address_1 = '" . $this->db->escape($data['payment_address_1']) . "', payment_address_2 = '" . $this->db->escape($data['payment_address_2']) . "', payment_city = '" . $this->db->escape($data['payment_city']) . "', payment_postcode = '" . $this->db->escape($data['payment_postcode']) . "', payment_country = '" . $this->db->escape($data['payment_country']) . "', payment_country_id = '" . (int)$data['payment_country_id'] . "', payment_zone = '" . $this->db->escape($data['payment_zone']) . "', payment_zone_id = '" . (int)$data['payment_zone_id'] . "', payment_address_format = '" . $this->db->escape($data['payment_address_format']) . "', payment_custom_field = '" . $this->db->escape(isset($data['payment_custom_field']) ? json_encode($data['payment_custom_field']) : '') . "', payment_method = '" . $this->db->escape($data['payment_method']) . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', shipping_firstname = '" . $this->db->escape($data['shipping_firstname']) . "', shipping_lastname = '" . $this->db->escape($data['shipping_lastname']) . "', shipping_company = '" . $this->db->escape($data['shipping_company']) . "', shipping_address_1 = '" . $this->db->escape($data['shipping_address_1']) . "', shipping_address_2 = '" . $this->db->escape($data['shipping_address_2']) . "', shipping_city = '" . $this->db->escape($data['shipping_city']) . "', shipping_postcode = '" . $this->db->escape($data['shipping_postcode']) . "', shipping_country = '" . $this->db->escape($data['shipping_country']) . "', shipping_country_id = '" . (int)$data['shipping_country_id'] . "', shipping_zone = '" . $this->db->escape($data['shipping_zone']) . "', shipping_zone_id = '" . (int)$data['shipping_zone_id'] . "', shipping_address_format = '" . $this->db->escape($data['shipping_address_format']) . "', shipping_custom_field = '" . $this->db->escape(isset($data['shipping_custom_field']) ? json_encode($data['shipping_custom_field']) : '') . "', shipping_method = '" . $this->db->escape($data['shipping_method']) . "', shipping_code = '" . $this->db->escape($data['shipping_code']) . "', comment = '" . $this->db->escape($data['comment']) . "', total = '" . (float)$data['total'] . "', affiliate_id = '" . (int)$data['affiliate_id'] . "', commission = '" . (float)$data['commission'] . "', marketing_id = '" . (int)$data['marketing_id'] . "', tracking = '" . $this->db->escape($data['tracking']) . "', language_id = '" . (int)$data['language_id'] . "', currency_id = '" . (int)$data['currency_id'] . "', currency_code = '" . $this->db->escape($data['currency_code']) . "', currency_value = '" . (float)$data['currency_value'] . "', ip = '" . $this->db->escape($data['ip']) . "', forwarded_ip = '" .  $this->db->escape($data['forwarded_ip']) . "', user_agent = '" . $this->db->escape($data['user_agent']) . "', accept_language = '" . $this->db->escape($data['accept_language']) . "', date_added = NOW(), date_modified = NOW()");

		$order_id = $this->db->getLastId();

		// Products
		if (isset($data['products'])) {
			foreach ($data['products'] as $product) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_product SET order_id = '" . (int)$order_id . "', product_id = '" . (int)$product['product_id'] . "', name = '" . $this->db->escape($product['name']) . "', model = '" . $this->db->escape($product['model']) . "', quantity = '" . (int)$product['quantity'] . "', price = '" . (float)$product['price'] . "', total = '" . (float)$product['total'] . "', tax = '" . (float)$product['tax'] . "', reward = '" . (int)$product['reward'] . "'");

				$order_product_id = $this->db->getLastId();

                    $product_info = $this->model_vendor_lts_product->getVendorProduct($product['product_id']);

                    if($product_info) {
                        if(!empty($product_info['vendor_id'])) {
                            $vendor_products[] = $order_product_id;
                        }
                    }
                

				foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "order_option SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
		}

		// Gift Voucher
		$this->load->model('extension/total/voucher');

		// Vouchers
		if (isset($data['vouchers'])) {
			foreach ($data['vouchers'] as $voucher) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_voucher SET order_id = '" . (int)$order_id . "', description = '" . $this->db->escape($voucher['description']) . "', code = '" . $this->db->escape($voucher['code']) . "', from_name = '" . $this->db->escape($voucher['from_name']) . "', from_email = '" . $this->db->escape($voucher['from_email']) . "', to_name = '" . $this->db->escape($voucher['to_name']) . "', to_email = '" . $this->db->escape($voucher['to_email']) . "', voucher_theme_id = '" . (int)$voucher['voucher_theme_id'] . "', message = '" . $this->db->escape($voucher['message']) . "', amount = '" . (float)$voucher['amount'] . "'");

				$order_voucher_id = $this->db->getLastId();

				$voucher_id = $this->model_extension_total_voucher->addVoucher($order_id, $voucher);

				$this->db->query("UPDATE " . DB_PREFIX . "order_voucher SET voucher_id = '" . (int)$voucher_id . "' WHERE order_voucher_id = '" . (int)$order_voucher_id . "'");
			}
		}

		// Totals
		if (isset($data['totals'])) {
			foreach ($data['totals'] as $total) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_total SET order_id = '" . (int)$order_id . "', code = '" . $this->db->escape($total['code']) . "', title = '" . $this->db->escape($total['title']) . "', `value` = '" . (float)$total['value'] . "', sort_order = '" . (int)$total['sort_order'] . "'");
			}
		}


               if($this->config->get('module_lts_vendor_status')) {
               
                     foreach($vendor_products as $order_product_id) {
                         $order_product_info = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "' AND order_product_id = '". (int)$order_product_id ."'")->row;
                         if($order_product_info) {

                             $product_info = $this->model_vendor_lts_product->getVendorProduct($order_product_info['product_id']);
                             if(!empty($product_info['vendor_id'])) {
                                 $this->db->query("INSERT INTO " . DB_PREFIX . "lts_order_product SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', vendor_id = '" . (int)$product_info['vendor_id'] . "', product_id = '" . (int)$order_product_info['product_id'] . "', quantity = '" . (int)$order_product_info['quantity'] . "', price = '" . (float)$order_product_info['price'] . "', total = '" . (float)$order_product_info['total'] . "', tax = '" . (float)$order_product_info['tax'] . "', date_added = NOW(), date_modified = NOW()");


                                  if($this->config->get('module_lts_vendor_receive_mail_product_purchase')) {

                                      $order_info = $this->getOrder($order_id);

                                      $this->load->language('account/vendor/lts_order_alert');
                                      
                                      // HTML Mail
                                      $data['text_received'] = $this->language->get('text_received');
                                      $data['text_order_id'] = $this->language->get('text_order_id');
                                      $data['text_date_added'] = $this->language->get('text_date_added');
                                      $data['text_order_status'] = $this->language->get('text_order_status');
                                      $data['text_product'] = $this->language->get('text_product');
                                      $data['text_total'] = $this->language->get('text_total');
                                      $data['text_comment'] = $this->language->get('text_comment');
                                      
                                      $data['order_id'] = $order_info['order_id'];
                                      $data['date_added'] = date($this->language->get('date_format_short'), strtotime($order_info['date_added']));

                                      $order_status_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_status WHERE order_status_id = '" . (int)$order_info['order_status_id'] . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");

                                      if ($order_status_query->num_rows) {
                                          $data['order_status'] = $order_status_query->row['name'];
                                      } else {
                                          $data['order_status'] = '';
                                      }


                                     // $order_status_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_status WHERE order_status_id = '" . (int)$order_info['order_status_id'] . "' AND language_id = '" . (int)$this->config->get('config_language_id') . "'");

                                      $order_product = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_product_id = '". (int)$order_product_id ."' AND order_id = '" . (int)$order_id . "'")->row;
                                 
                                     
                                          $data['name']     = $order_product['name'];
                                          $data['model']    = $order_product['model'];
                                          $data['quantity'] = $order_product['quantity'];
                                          $data['total']    = $order_product['total'];
                                  

                                      $vendor_email = $this->db->query("SELECT email FROM ". DB_PREFIX ."lts_vendor WHERE vendor_id = '". (int)$product_info['vendor_id'] ."'")->row;
                                     
                                      $mail = new Mail($this->config->get('config_mail_engine'));
                                      $mail->parameter = $this->config->get('config_mail_parameter');
                                      $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
                                      $mail->smtp_username = $this->config->get('config_mail_smtp_username');
                                      $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
                                      $mail->smtp_port = $this->config->get('config_mail_smtp_port');
                                      $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

                                      $mail->setTo($vendor_email);
                                      $mail->setFrom($this->config->get('config_email'));
                                      $mail->setSender(html_entity_decode($order_info['store_name'], ENT_QUOTES, 'UTF-8'));
                                      $mail->setSubject(html_entity_decode(sprintf($this->language->get('text_subject'), $this->config->get('config_name'), $order_info['order_id']), ENT_QUOTES, 'UTF-8'));
                                      $mail->setText($this->load->view('account/vendor/lts_order_alert', $data));
                                      $mail->send();

                                      // Send to additional alert emails
                                     /* $emails = explode(',', $this->config->get('config_mail_alert_email'));

                                      foreach ($emails as $email) {
                                          if ($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                              $mail->setTo($email);
                                              $mail->send();
                                          }
                                      } */
                                      
                                  }
                             }
                         }
                     }
                  }
                
		return $order_id;
	}

	public function editOrder($order_id, $data) {

                    $this->load->model('vendor/lts_product');
                    $vendor_products = array();
                
		// Void the order first
		$this->addOrderHistory($order_id, 0);

		$this->db->query("UPDATE `" . DB_PREFIX . "order` SET invoice_prefix = '" . $this->db->escape($data['invoice_prefix']) . "', store_id = '" . (int)$data['store_id'] . "', store_name = '" . $this->db->escape($data['store_name']) . "', store_url = '" . $this->db->escape($data['store_url']) . "', customer_id = '" . (int)$data['customer_id'] . "', customer_group_id = '" . (int)$data['customer_group_id'] . "', firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', custom_field = '" . $this->db->escape(json_encode($data['custom_field'])) . "', payment_firstname = '" . $this->db->escape($data['payment_firstname']) . "', payment_lastname = '" . $this->db->escape($data['payment_lastname']) . "', payment_company = '" . $this->db->escape($data['payment_company']) . "', payment_address_1 = '" . $this->db->escape($data['payment_address_1']) . "', payment_address_2 = '" . $this->db->escape($data['payment_address_2']) . "', payment_city = '" . $this->db->escape($data['payment_city']) . "', payment_postcode = '" . $this->db->escape($data['payment_postcode']) . "', payment_country = '" . $this->db->escape($data['payment_country']) . "', payment_country_id = '" . (int)$data['payment_country_id'] . "', payment_zone = '" . $this->db->escape($data['payment_zone']) . "', payment_zone_id = '" . (int)$data['payment_zone_id'] . "', payment_address_format = '" . $this->db->escape($data['payment_address_format']) . "', payment_custom_field = '" . $this->db->escape(json_encode($data['payment_custom_field'])) . "', payment_method = '" . $this->db->escape($data['payment_method']) . "', payment_code = '" . $this->db->escape($data['payment_code']) . "', shipping_firstname = '" . $this->db->escape($data['shipping_firstname']) . "', shipping_lastname = '" . $this->db->escape($data['shipping_lastname']) . "', shipping_company = '" . $this->db->escape($data['shipping_company']) . "', shipping_address_1 = '" . $this->db->escape($data['shipping_address_1']) . "', shipping_address_2 = '" . $this->db->escape($data['shipping_address_2']) . "', shipping_city = '" . $this->db->escape($data['shipping_city']) . "', shipping_postcode = '" . $this->db->escape($data['shipping_postcode']) . "', shipping_country = '" . $this->db->escape($data['shipping_country']) . "', shipping_country_id = '" . (int)$data['shipping_country_id'] . "', shipping_zone = '" . $this->db->escape($data['shipping_zone']) . "', shipping_zone_id = '" . (int)$data['shipping_zone_id'] . "', shipping_address_format = '" . $this->db->escape($data['shipping_address_format']) . "', shipping_custom_field = '" . $this->db->escape(json_encode($data['shipping_custom_field'])) . "', shipping_method = '" . $this->db->escape($data['shipping_method']) . "', shipping_code = '" . $this->db->escape($data['shipping_code']) . "', comment = '" . $this->db->escape($data['comment']) . "', total = '" . (float)$data['total'] . "', affiliate_id = '" . (int)$data['affiliate_id'] . "', commission = '" . (float)$data['commission'] . "', date_modified = NOW() WHERE order_id = '" . (int)$order_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "order_option WHERE order_id = '" . (int)$order_id . "'");

		// Products
		if (isset($data['products'])) {
			foreach ($data['products'] as $product) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_product SET order_id = '" . (int)$order_id . "', product_id = '" . (int)$product['product_id'] . "', name = '" . $this->db->escape($product['name']) . "', model = '" . $this->db->escape($product['model']) . "', quantity = '" . (int)$product['quantity'] . "', price = '" . (float)$product['price'] . "', total = '" . (float)$product['total'] . "', tax = '" . (float)$product['tax'] . "', reward = '" . (int)$product['reward'] . "'");

				$order_product_id = $this->db->getLastId();

                    $product_info = $this->model_vendor_lts_product->getVendorProduct($product['product_id']);

                    if($product_info) {
                        if(!empty($product_info['vendor_id'])) {
                            $vendor_products[] = $order_product_id;
                        }
                    }
                

				foreach ($product['option'] as $option) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "order_option SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', product_option_id = '" . (int)$option['product_option_id'] . "', product_option_value_id = '" . (int)$option['product_option_value_id'] . "', name = '" . $this->db->escape($option['name']) . "', `value` = '" . $this->db->escape($option['value']) . "', `type` = '" . $this->db->escape($option['type']) . "'");
				}
			}
		}

		// Gift Voucher
		$this->load->model('extension/total/voucher');

		$this->model_extension_total_voucher->disableVoucher($order_id);

		// Vouchers
		$this->db->query("DELETE FROM " . DB_PREFIX . "order_voucher WHERE order_id = '" . (int)$order_id . "'");

		if (isset($data['vouchers'])) {
			foreach ($data['vouchers'] as $voucher) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_voucher SET order_id = '" . (int)$order_id . "', description = '" . $this->db->escape($voucher['description']) . "', code = '" . $this->db->escape($voucher['code']) . "', from_name = '" . $this->db->escape($voucher['from_name']) . "', from_email = '" . $this->db->escape($voucher['from_email']) . "', to_name = '" . $this->db->escape($voucher['to_name']) . "', to_email = '" . $this->db->escape($voucher['to_email']) . "', voucher_theme_id = '" . (int)$voucher['voucher_theme_id'] . "', message = '" . $this->db->escape($voucher['message']) . "', amount = '" . (float)$voucher['amount'] . "'");

				$order_voucher_id = $this->db->getLastId();

				$voucher_id = $this->model_extension_total_voucher->addVoucher($order_id, $voucher);

				$this->db->query("UPDATE " . DB_PREFIX . "order_voucher SET voucher_id = '" . (int)$voucher_id . "' WHERE order_voucher_id = '" . (int)$order_voucher_id . "'");
			}
		}

		// Totals

                if($this->config->get('module_lts_vendor_status')) {
                    $this->db->query("DELETE FROM `" . DB_PREFIX . "lts_order_product` WHERE order_id = '" . (int)$order_id . "'");
                   foreach($vendor_products as $order_product_id) {
                       $order_product_info = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "' AND order_product_id = '". (int)$order_product_id ."'")->row;
                       if($order_product_info) {
                           $product_info = $this->model_vendor_lts_product->getVendorProduct($order_product_info['product_id']);
                           if(!empty($product_info['vendor_id'])) {
                               $this->db->query("INSERT INTO " . DB_PREFIX . "lts_order_product SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$order_product_id . "', vendor_id = '" . (int)$product_info['vendor_id'] . "', product_id = '" . (int)$order_product_info['product_id'] . "', quantity = '" . (int)$order_product_info['quantity'] . "', price = '" . (float)$order_product_info['price'] . "', total = '" . (float)$order_product_info['total'] . "', tax = '" . (float)$order_product_info['tax'] . "', date_added = NOW(), date_modified = NOW()");
                           }
                       }
                   }
                }
                
		$this->db->query("DELETE FROM " . DB_PREFIX . "order_total WHERE order_id = '" . (int)$order_id . "'");

		if (isset($data['totals'])) {
			foreach ($data['totals'] as $total) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "order_total SET order_id = '" . (int)$order_id . "', code = '" . $this->db->escape($total['code']) . "', title = '" . $this->db->escape($total['title']) . "', `value` = '" . (float)$total['value'] . "', sort_order = '" . (int)$total['sort_order'] . "'");
			}
		}
	}

	public function deleteOrder($order_id) {
		// Void the order first
		$this->addOrderHistory($order_id, 0);

		$this->db->query("DELETE FROM `" . DB_PREFIX . "order` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_product` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_option` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_voucher` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_total` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "order_history` WHERE order_id = '" . (int)$order_id . "'");
		$this->db->query("DELETE `or`, ort FROM `" . DB_PREFIX . "order_recurring` `or`, `" . DB_PREFIX . "order_recurring_transaction` `ort` WHERE order_id = '" . (int)$order_id . "' AND ort.order_recurring_id = `or`.order_recurring_id");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "customer_transaction` WHERE order_id = '" . (int)$order_id . "'");

		// Gift Voucher
		$this->load->model('extension/total/voucher');

		$this->model_extension_total_voucher->disableVoucher($order_id);
	}

	public function getOrder($order_id) {
		$order_query = $this->db->query("SELECT *, (SELECT os.name FROM `" . DB_PREFIX . "order_status` os WHERE os.order_status_id = o.order_status_id AND os.language_id = o.language_id) AS order_status FROM `" . DB_PREFIX . "order` o WHERE o.order_id = '" . (int)$order_id . "'");

		if ($order_query->num_rows) {
			$country_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "country` WHERE country_id = '" . (int)$order_query->row['payment_country_id'] . "'");

			if ($country_query->num_rows) {
				$payment_iso_code_2 = $country_query->row['iso_code_2'];
				$payment_iso_code_3 = $country_query->row['iso_code_3'];
			} else {
				$payment_iso_code_2 = '';
				$payment_iso_code_3 = '';
			}

			$zone_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE zone_id = '" . (int)$order_query->row['payment_zone_id'] . "'");

			if ($zone_query->num_rows) {
				$payment_zone_code = $zone_query->row['code'];
			} else {
				$payment_zone_code = '';
			}

			$country_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "country` WHERE country_id = '" . (int)$order_query->row['shipping_country_id'] . "'");

			if ($country_query->num_rows) {
				$shipping_iso_code_2 = $country_query->row['iso_code_2'];
				$shipping_iso_code_3 = $country_query->row['iso_code_3'];
			} else {
				$shipping_iso_code_2 = '';
				$shipping_iso_code_3 = '';
			}

			$zone_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "zone` WHERE zone_id = '" . (int)$order_query->row['shipping_zone_id'] . "'");

			if ($zone_query->num_rows) {
				$shipping_zone_code = $zone_query->row['code'];
			} else {
				$shipping_zone_code = '';
			}

			$this->load->model('localisation/language');

			$language_info = $this->model_localisation_language->getLanguage($order_query->row['language_id']);

			if ($language_info) {
				$language_code = $language_info['code'];
			} else {
				$language_code = $this->config->get('config_language');
			}

			return array(
				'order_id'                => $order_query->row['order_id'],
				'invoice_no'              => $order_query->row['invoice_no'],
				'invoice_prefix'          => $order_query->row['invoice_prefix'],
				'store_id'                => $order_query->row['store_id'],
				'store_name'              => $order_query->row['store_name'],
				'store_url'               => $order_query->row['store_url'],
				'customer_id'             => $order_query->row['customer_id'],
				'firstname'               => $order_query->row['firstname'],
				'lastname'                => $order_query->row['lastname'],
				'email'                   => $order_query->row['email'],
				'telephone'               => $order_query->row['telephone'],
				'custom_field'            => json_decode($order_query->row['custom_field'], true),
				'payment_firstname'       => $order_query->row['payment_firstname'],
				'payment_lastname'        => $order_query->row['payment_lastname'],
				'payment_company'         => $order_query->row['payment_company'],
				'payment_address_1'       => $order_query->row['payment_address_1'],
				'payment_address_2'       => $order_query->row['payment_address_2'],
				'payment_postcode'        => $order_query->row['payment_postcode'],
				'payment_city'            => $order_query->row['payment_city'],
				'payment_zone_id'         => $order_query->row['payment_zone_id'],
				'payment_zone'            => $order_query->row['payment_zone'],
				'payment_zone_code'       => $payment_zone_code,
				'payment_country_id'      => $order_query->row['payment_country_id'],
				'payment_country'         => $order_query->row['payment_country'],
				'payment_iso_code_2'      => $payment_iso_code_2,
				'payment_iso_code_3'      => $payment_iso_code_3,
				'payment_address_format'  => $order_query->row['payment_address_format'],
				'payment_custom_field'    => json_decode($order_query->row['payment_custom_field'], true),
				'payment_method'          => $order_query->row['payment_method'],
				'payment_code'            => $order_query->row['payment_code'],
				'shipping_firstname'      => $order_query->row['shipping_firstname'],
				'shipping_lastname'       => $order_query->row['shipping_lastname'],
				'shipping_company'        => $order_query->row['shipping_company'],
				'shipping_address_1'      => $order_query->row['shipping_address_1'],
				'shipping_address_2'      => $order_query->row['shipping_address_2'],
				'shipping_postcode'       => $order_query->row['shipping_postcode'],
				'shipping_city'           => $order_query->row['shipping_city'],
				'shipping_zone_id'        => $order_query->row['shipping_zone_id'],
				'shipping_zone'           => $order_query->row['shipping_zone'],
				'shipping_zone_code'      => $shipping_zone_code,
				'shipping_country_id'     => $order_query->row['shipping_country_id'],
				'shipping_country'        => $order_query->row['shipping_country'],
				'shipping_iso_code_2'     => $shipping_iso_code_2,
				'shipping_iso_code_3'     => $shipping_iso_code_3,
				'shipping_address_format' => $order_query->row['shipping_address_format'],
				'shipping_custom_field'   => json_decode($order_query->row['shipping_custom_field'], true),
				'shipping_method'         => $order_query->row['shipping_method'],
				'shipping_code'           => $order_query->row['shipping_code'],
				'comment'                 => $order_query->row['comment'],
				'total'                   => $order_query->row['total'],
				'order_status_id'         => $order_query->row['order_status_id'],
				'order_status'            => $order_query->row['order_status'],
				'affiliate_id'            => $order_query->row['affiliate_id'],
				'commission'              => $order_query->row['commission'],
				'language_id'             => $order_query->row['language_id'],
				'language_code'           => $language_code,
				'currency_id'             => $order_query->row['currency_id'],
				'currency_code'           => $order_query->row['currency_code'],
				'currency_value'          => $order_query->row['currency_value'],
				'ip'                      => $order_query->row['ip'],
				'forwarded_ip'            => $order_query->row['forwarded_ip'],
				'user_agent'              => $order_query->row['user_agent'],
				'accept_language'         => $order_query->row['accept_language'],
				'date_added'              => $order_query->row['date_added'],
				'date_modified'           => $order_query->row['date_modified']
			);
		} else {
			return false;
		}
	}
	
	public function getOrderProducts($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "'");
		
		return $query->rows;
	}
	
	public function getOrderOptions($order_id, $order_product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_option WHERE order_id = '" . (int)$order_id . "' AND order_product_id = '" . (int)$order_product_id . "'");
		
		return $query->rows;
	}
	
	public function getOrderVouchers($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_voucher WHERE order_id = '" . (int)$order_id . "'");
	
		return $query->rows;
	}
	
	public function getOrderTotals($order_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "order_total` WHERE order_id = '" . (int)$order_id . "' ORDER BY sort_order ASC");
		
		return $query->rows;
	}	
			
	public function addOrderHistory($order_id, $order_status_id, $comment = '', $notify = false, $override = false) {
		$order_info = $this->getOrder($order_id);
		
		if ($order_info) {
			// Fraud Detection
			$this->load->model('account/customer');

			$customer_info = $this->model_account_customer->getCustomer($order_info['customer_id']);

			if ($customer_info && $customer_info['safe']) {
				$safe = true;
			} else {
				$safe = false;
			}

			// Only do the fraud check if the customer is not on the safe list and the order status is changing into the complete or process order status
			if (!$safe && !$override && in_array($order_status_id, array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status')))) {
				// Anti-Fraud
				$this->load->model('setting/extension');

				$extensions = $this->model_setting_extension->getExtensions('fraud');

				foreach ($extensions as $extension) {
					if ($this->config->get('fraud_' . $extension['code'] . '_status')) {
						$this->load->model('extension/fraud/' . $extension['code']);

						if (property_exists($this->{'model_extension_fraud_' . $extension['code']}, 'check')) {
							$fraud_status_id = $this->{'model_extension_fraud_' . $extension['code']}->check($order_info);
	
							if ($fraud_status_id) {
								$order_status_id = $fraud_status_id;
							}
						}
					}
				}
			}

			// If current order status is not processing or complete but new status is processing or complete then commence completing the order
			if (!in_array($order_info['order_status_id'], array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status'))) && in_array($order_status_id, array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status')))) {
				// Redeem coupon, vouchers and reward points
				$order_totals = $this->getOrderTotals($order_id);

				foreach ($order_totals as $order_total) {
					$this->load->model('extension/total/' . $order_total['code']);

					if (property_exists($this->{'model_extension_total_' . $order_total['code']}, 'confirm')) {
						// Confirm coupon, vouchers and reward points
						$fraud_status_id = $this->{'model_extension_total_' . $order_total['code']}->confirm($order_info, $order_total);
						
						// If the balance on the coupon, vouchers and reward points is not enough to cover the transaction or has already been used then the fraud order status is returned.
						if ($fraud_status_id) {
							$order_status_id = $fraud_status_id;
						}
					}
				}

				// Stock subtraction
				$order_products = $this->getOrderProducts($order_id);

				foreach ($order_products as $order_product) {

                    $is_subtract=$this->db->query("SELECT * FROM `" . DB_PREFIX . "product` WHERE product_id = '" . (int)$order_product['product_id'] . "' AND subtract = '1'");
                    if($is_subtract->num_rows){
                   $this->db->query("UPDATE " . DB_PREFIX . "lts_product SET quantity = (quantity - " . (int)$order_product['quantity'] . ") WHERE product_id = '" . (int)$order_product['product_id'] . "' ");
                   }
                
					$this->db->query("UPDATE " . DB_PREFIX . "product SET quantity = (quantity - " . (int)$order_product['quantity'] . ") WHERE product_id = '" . (int)$order_product['product_id'] . "' AND subtract = '1'");

					$order_options = $this->getOrderOptions($order_id, $order_product['order_product_id']);

					foreach ($order_options as $order_option) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET quantity = (quantity - " . (int)$order_product['quantity'] . ") WHERE product_option_value_id = '" . (int)$order_option['product_option_value_id'] . "' AND subtract = '1'");
					}
				}
				
				// Add commission if sale is linked to affiliate referral.
				if ($order_info['affiliate_id'] && $this->config->get('config_affiliate_auto')) {
					$this->load->model('account/customer');

					if (!$this->model_account_customer->getTotalTransactionsByOrderId($order_id)) {
						$this->model_account_customer->addTransaction($order_info['affiliate_id'], $this->language->get('text_order_id') . ' #' . $order_id, $order_info['commission'], $order_id);
					}
				}
			}

			// Update the DB with the new statuses

                if($this->config->get('module_lts_vendor_status')) {
                    $this->load->model('account/vendor/lts_order');
                    $vendor_products = $this->model_account_vendor_lts_order->getVendorOrderProducts($order_id);
                    foreach($vendor_products as $vendor_product) {
                        $vendor_order_history_info = $this->model_account_vendor_lts_order->getVendorLatestOrderHistory($vendor_product['order_id'], $vendor_product['vendor_id']);
                        if(!empty($vendor_order_history_info)) {
                            $add_order_status_id = $vendor_order_history_info['order_status_id'];
                        }

                        // if(!empty($vendor_order_history_info)) {
                            $this->db->query("INSERT INTO " . DB_PREFIX . "lts_order_history SET order_id = '" . (int)$order_id . "', order_status_id = '" . (int)$order_status_id . "', notify = '" . (int)$notify . "', comment = '" . $this->db->escape($comment) . "', date_added = NOW(), vendor_id = '". (int)$vendor_product['vendor_id'] ."'");

                            $add_order_status_id = $order_status_id;
                       // }

                        $this->db->query("UPDATE `" . DB_PREFIX . "lts_order_product` SET order_status_id = '" . (int)$add_order_status_id . "', date_modified = NOW() WHERE product_id = '" . (int)$vendor_product['product_id'] . "' AND order_id = '" . (int)$order_id . "'");
                    }

                    $vendor_products = $this->model_account_vendor_lts_order->getVendorOrderProducts($order_id);

                    foreach($vendor_products as $vendor_product) {

                        $vendor_info = $this->db->query("SELECT * FROM ". DB_PREFIX ."lts_vendor WHERE vendor_id = '". (int)$vendor_product['vendor_id'] ."'")->row;
                        if($vendor_info) {
                            

                            if(($this->config->get('module_lts_vendor_received_commission_status_id') == $order_status_id) && ($this->config->get('module_lts_vendor_received_commission_status_id') == $vendor_product['order_status_id'])) {
                                if($vendor_info['commission_rate'] != 0) {
                                    $vendor_commission_rate = $vendor_info['commission_rate'];
                                } else  {
                                    $vendor_commission_rate = $this->config->get('module_lts_vendor_default_commission');
                                }

                                $amount_rate = ($vendor_product['total'] * $vendor_commission_rate) / 100;

                                $vendor_commission_info = $this->db->query("SELECT * FROM ". DB_PREFIX ."lts_commission WHERE order_id = '" . (int)$order_id . "' AND order_product_id = '" . (int)$vendor_product['order_product_id'] . "' AND product_id = '" . (int)$vendor_product['product_id'] . "' AND vendor_id = '" . (int)$vendor_product['vendor_id'] . "' AND type = 'sale'")->row;

                                if($vendor_commission_info) {
                                    $this->db->query("UPDATE " . DB_PREFIX . "lts_commission SET amount = '" . (float)$amount_rate . "', type = 'sale', status = '1', date_modified = NOW() WHERE vendor_commission_id = '". (int)$vendor_commission_info['vendor_commission_id'] ."'");

                                } else {
                                    $this->db->query("INSERT INTO " . DB_PREFIX . "lts_commission SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$vendor_product['order_product_id'] . "', product_id = '" . (int)$vendor_product['product_id'] . "', vendor_id = '" . (int)$vendor_product['vendor_id'] . "', amount = '" . (float)$amount_rate . "', type = 'sale', status = '1', date_added = NOW(), date_modified = NOW()");
                                }
                            } else {
                                $amount_rate = 0;

                                $vendor_commission_info = $this->db->query("SELECT * FROM ". DB_PREFIX ."lts_commission WHERE order_id = '" . (int)$order_id . "' AND order_product_id = '" . (int)$vendor_product['order_product_id'] . "' AND product_id = '" . (int)$vendor_product['product_id'] . "' AND vendor_id = '" . (int)$vendor_product['vendor_id'] . "' AND type = 'sale'")->row;

                                if($vendor_commission_info) {
                                    $this->db->query("UPDATE " . DB_PREFIX . "lts_commission SET amount = '" . (float)$amount_rate . "', type = 'sale', status = '1', date_modified = NOW() WHERE vendor_commission_id = '". (int)$vendor_commission_info['vendor_commission_id'] ."'");

                                } else {
                                    $this->db->query("INSERT INTO " . DB_PREFIX . "lts_commission SET order_id = '" . (int)$order_id . "', order_product_id = '" . (int)$vendor_product['order_product_id'] . "', product_id = '" . (int)$vendor_product['product_id'] . "', vendor_id = '" . (int)$vendor_product['vendor_id'] . "', amount = '" . (float)$amount_rate . "', type = 'sale', status = '1', date_added = NOW(), date_modified = NOW()");

                                }
                            }
                        }
                    }
                }
                
                
			$this->db->query("UPDATE `" . DB_PREFIX . "order` SET order_status_id = '" . (int)$order_status_id . "', date_modified = NOW() WHERE order_id = '" . (int)$order_id . "'");

			$this->db->query("INSERT INTO " . DB_PREFIX . "order_history SET order_id = '" . (int)$order_id . "', order_status_id = '" . (int)$order_status_id . "', notify = '" . (int)$notify . "', comment = '" . $this->db->escape($comment) . "', date_added = NOW()");

			// If old order status is the processing or complete status but new status is not then commence restock, and remove coupon, voucher and reward history
			if (in_array($order_info['order_status_id'], array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status'))) && !in_array($order_status_id, array_merge($this->config->get('config_processing_status'), $this->config->get('config_complete_status')))) {
				// Restock
				$order_products = $this->getOrderProducts($order_id);

				foreach($order_products as $order_product) {

                     $is_subtract=$this->db->query("SELECT * FROM `" . DB_PREFIX . "product` WHERE product_id = '" . (int)$order_product['product_id'] . "' AND subtract = '1'");
                    if($is_subtract->num_rows){
                  $this->db->query("UPDATE `" . DB_PREFIX . "lts_product` SET quantity = (quantity + " . (int)$order_product['quantity'] . ") WHERE product_id = '" . (int)$order_product['product_id'] . "' ");
                  }
                
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET quantity = (quantity + " . (int)$order_product['quantity'] . ") WHERE product_id = '" . (int)$order_product['product_id'] . "' AND subtract = '1'");

					$order_options = $this->getOrderOptions($order_id, $order_product['order_product_id']);

					foreach ($order_options as $order_option) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET quantity = (quantity + " . (int)$order_product['quantity'] . ") WHERE product_option_value_id = '" . (int)$order_option['product_option_value_id'] . "' AND subtract = '1'");
					}
				}

				// Remove coupon, vouchers and reward points history
				$order_totals = $this->getOrderTotals($order_id);
				
				foreach ($order_totals as $order_total) {
					$this->load->model('extension/total/' . $order_total['code']);

					if (property_exists($this->{'model_extension_total_' . $order_total['code']}, 'unconfirm')) {
						$this->{'model_extension_total_' . $order_total['code']}->unconfirm($order_id);
					}
				}

				// Remove commission if sale is linked to affiliate referral.
				if ($order_info['affiliate_id']) {
					$this->load->model('account/customer');
					
					$this->model_account_customer->deleteTransactionByOrderId($order_id);
				}
			}

			$this->cache->delete('product');
		}
	}
}