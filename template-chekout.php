<?php /*Template Name: checkout*/ get_header();
	
	if ( $_POST['traning_title'] ) {
			$tr_title = $_POST['traning_title'];
		}
	if ( $_POST['traning_price'] ) {
			$tr_price = $_POST['traning_price'];
		}
	if ( $_POST['module_title1'] ) {
			$mod_title1 = $_POST['module_title1'];
		}
	if ( $_POST['module_price1'] ) {
			$mod_price1 = $_POST['module_price1'];
		}
	if ( $_POST['module_title2'] ) {
			$mod_title2 = $_POST['module_title2'];
		}
	if ( $_POST['module_price2'] ) {
			$mod_price2 = $_POST['module_price2'];
		}
	if ( $_POST['module_title3'] ) {
			$mod_title3 = $_POST['module_title3'];
		}
	if ( $_POST['module_price3'] ) {
			$mod_price3 = $_POST['module_price3'];
		}
	if ( $_POST['traning_date'] ) {
			$tr_date = $_POST['traning_date'];
		}
	
	?>
    <main class="td-main">
        <div class="checkout__wrapper">
            <div class="checkout__label">
                <img src="<?php echo SD_THEME_IMAGE_URI; ?>/svg/tp.svg" alt="Campus Clinic">
            </div>
            <div class="checkout__breadcrumbs">
                <ul class="breadcrumbs">
                    <li class='breadcrumbs-item'>
                        <a href="<?php echo home_url(); ?>/#about">Accueil</a>
                    </li>
                    <li class='breadcrumbs-item'>
                        <a href="#" onclick="javascript:history.back(); return false;"><?php echo $tr_title ?> </a>
                    </li>
                    <li class='breadcrumbs-item'>
                        INSCRIPTION
                    </li>
                </ul>
            </div>
            <div class="checkout__title checkout__title_mob">
                <div class="checkout__icon">
                    <img src="<?php echo SD_THEME_IMAGE_URI; ?>/svg/card-1.svg" alt="Campus Clinic">
                </div>
                <span>INSCRIPTION</span>
            </div>
            <div class="checkout-row checkout-row-reverse">
               
                <div class="checkout-col-6 checkout-col-12">
                    <div class="checkout__left">
                        <div class="checkout__title checkout__title_desc">
                            <div class="checkout__icon">
                                <img src="<?php echo SD_THEME_IMAGE_URI; ?>/svg/card-1.svg" alt="Campus Clinic">
                            </div>
                            <span>INSCRIPTION</span>
                        </div>
                        <div class="checkout__form">
                           
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox-input" id="checkout__checkbox-input-0" type="checkbox" checked>
                                    <label class="checkout__checkbox-label" for="checkout__checkbox-input-0">Programme Formation complete eclaircissement (<? echo $tr_title; ?>) — <span><? echo $tr_price; ?></span><span> €</span></label>  
                                </div>   
								<? if ($mod_price1) {?>
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox-input" id="checkout__checkbox-input-1" type="checkbox" >
                                    <label class="checkout__checkbox-label" for="checkout__checkbox-input-1"><? echo $mod_title1; ?> — <span><? echo $mod_price1; ?></span><span> €</span></label>  
                                </div>   
								<?}?>
								<? if ($mod_price2) {?>
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox-input" id="checkout__checkbox-input-2" type="checkbox">
                                    <label class="checkout__checkbox-label" for="checkout__checkbox-input-2"><? echo $mod_title2; ?> — <span><? echo $mod_price2; ?></span><span> €</span></label>  
                                </div>   
								<?}?>
								<? if ($mod_price3) {?>
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox-input" id="checkout__checkbox-input-3" type="checkbox" >
                                    <label class="checkout__checkbox-label" for="checkout__checkbox-input-3"><? echo $mod_title3; ?> — <span><? echo $mod_price3; ?></span><span> €</span></label>  
                                </div>  
								<? } ?>
                                <div class="checkout__form-title">
                                    <span>Renseignez vos coordonées</span>
                                </div>
                                <!--<div class="checkout__input">
                                    <input type="text" placeholder='Votre prénom'>
                                </div>
                                <div class="checkout__input">
                                    <input type="text" placeholder='Votre nom'>
                                </div>
                                <div class="checkout__input">
                                    <input type="text" placeholder='Spécialité'>
                                </div>
                                <div class="checkout__input"> 
                                    <input type="text" placeholder='Adresse'>
                                </div>
                                <div class="checkout-row">
                                    <div class="checkout-col-6">
                                        <div class="checkout__input">
                                            <input type="text" placeholder='Code Postal'>
                                        </div>
                                    </div>
                                    <div class="checkout-col-6">
                                        <div class="checkout__input">
                                            <input type="text" placeholder='Ville'>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <input type="text" placeholder='Adresse email'>
                                </div>
                                <div class="checkout__input">
                                    <input type="text" placeholder='Numéro de téléphone'>
                                </div>
                                <div class="checkout__input">
                                    <input type="text" placeholder='N° ADELI / RPPS'>
                                </div>
                                <div class="checkout__input">
                                    <input type="text" placeholder='Portable'>
                                </div>
                                <button class="checkout__btn">valider</button>-->
								
								<? //echo do_shortcode( '[contact-form-7 id="240" title="Checkout form"]' ); ?>
								<? echo do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' ); ?>
                            
                        </div>
                    </div>
                </div>
                <div class="checkout-col-6 checkout-col-12">
                    <div class="checkout__right">
                        <div class="checkout__cart">
                            <div class="checkout__cart-title"><?php _e('Validez votre réservation', 'campus'); ?></div>
                            <div class="checkout__cart-list">
                                <div class="cart-item" id = "calc_item_full_program"> 
                                    <div class="cart-item__title">Programme Formation complete eclaircissement (<? echo $tr_title; ?>)</div>
                                    <div class="cart-item__date"><? echo $tr_date; ?></div>
                                    <div class="cart-item__quantity">
                                        <span><?php _e('Quantité', 'campus'); ?></span>
                                        <div class="quantity num-in ">
                                            <span class="quantity-minus minus">-</span>
                                            <input type="text" class="quantity-number in-num" value="1" readonly="">
                                            <span class="quantity-plus plus">+</span>
                                        </div>
                                        <div class="cart-item__price"><span><? echo $tr_price; ?></span> €</div>
                                    </div>
                                </div>
                                <div class="cart-item" id = "calc_item_mod1">
                                    <div class="cart-item__title"><? echo $mod_title1; ?></div>
                                    <div class="cart-item__date"><? echo $tr_date; ?></div>
                                    <div class="cart-item__quantity">
                                        <span><?php _e('Quantité', 'campus'); ?></span>
                                        <div class="quantity num-in ">
                                            <span class="quantity-minus minus ">-</span>
                                            <input type="text" class="quantity-number in-num" value="1" readonly="">
                                            <span class="quantity-plus plus">+</span>
                                        </div>
                                        <div class="cart-item__price"><span><? echo $mod_price1; ?></span> €</div>
                                    </div>
                                </div>
								<div class="cart-item" id = "calc_item_mod2">
                                    <div class="cart-item__title"><? echo $mod_title2; ?></div>
                                    <div class="cart-item__date"><? echo $tr_date; ?></div>
                                    <div class="cart-item__quantity">
                                        <span><?php _e('Quantité', 'campus'); ?></span>
                                        <div class="quantity num-in ">
                                            <span class="quantity-minus minus ">-</span>
                                            <input type="text" class="quantity-number in-num" value="1" readonly="">
                                            <span class="quantity-plus plus">+</span>
                                        </div>
                                        <div class="cart-item__price"><span><? echo $mod_price2; ?></span> €</div>
                                    </div>
                                </div>
								<div class="cart-item" id = "calc_item_mod3">
                                    <div class="cart-item__title"><? echo $mod_title3; ?></div>
                                    <div class="cart-item__date"><? echo $tr_date; ?></div>
                                    <div class="cart-item__quantity">
                                        <span><?php _e('Quantité', 'campus'); ?></span>
                                        <div class="quantity num-in ">
                                            <span class="quantity-minus minus ">-</span>
                                            <input type="text" class="quantity-number in-num" value="1" readonly="">
                                            <span class="quantity-plus plus">+</span>
                                        </div>
                                        <div class="cart-item__price"><span><? echo $mod_price3; ?></span> €</div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__cart-total">
                                <div class="cart-total__text"><?php _e('Total', 'campus'); ?></div>
                                <div class="cart-total__price"><span>5 850</span> €</div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
	
<script>
	$(document).ready(function () {
	$('#gform_submit_button_1').addClass('checkout__btn');
		if($("#checkout__checkbox-input-0").prop('checked'))
		{ $("#calc_item_full_program").show(); 
			$("#calc_item_full_program").addClass('calk-item'); 
			$("#checkout__checkbox-input-1").prop('checked', false);
			$("#checkout__checkbox-input-1").trigger('change');
			$("#checkout__checkbox-input-2").prop('checked', false);
			$("#checkout__checkbox-input-2").trigger('change');
			$("#checkout__checkbox-input-3").prop('checked', false);
			$("#checkout__checkbox-input-3").trigger('change');
			}
		else    { $("#calc_item_full_program").hide(); $("#calc_item_full_program").removeClass('calk-item'); }
		
	$("#checkout__checkbox-input-0").change(function() {
		if($("#checkout__checkbox-input-0").prop('checked'))
		{ $("#calc_item_full_program").show(); 
			$("#calc_item_full_program").addClass('calk-item'); 
			$("#checkout__checkbox-input-1").prop('checked', false);
			$("#checkout__checkbox-input-1").trigger('change');
			$("#checkout__checkbox-input-2").prop('checked', false);
			$("#checkout__checkbox-input-2").trigger('change');
			$("#checkout__checkbox-input-3").prop('checked', false);
			$("#checkout__checkbox-input-3").trigger('change');
			}
		else    { $("#calc_item_full_program").hide(); $("#calc_item_full_program").removeClass('calk-item'); }
	})
	/*mod1*/
	if($("#checkout__checkbox-input-1").prop('checked'))
	{$("#calc_item_mod1").show(); $("#calc_item_mod1").addClass('calk-item'); }
		else   { $("#calc_item_mod1").hide(); $("#calc_item_mod1").removeClass('calk-item'); }
		
	$("#checkout__checkbox-input-1").change(function() {
		if($("#checkout__checkbox-input-1").prop('checked'))
		{$("#calc_item_mod1").show(); 
			$("#calc_item_mod1").addClass('calk-item'); 
			$("#checkout__checkbox-input-0").prop('checked', false);
			$("#checkout__checkbox-input-0").trigger('change');
			}
		else   { $("#calc_item_mod1").hide(); $("#calc_item_mod1").removeClass('calk-item'); }
	})
	/*mod2*/
	if($("#checkout__checkbox-input-2").prop('checked'))
		{$("#calc_item_mod2").show(); $("#calc_item_mod2").addClass('calk-item'); 
			$("#checkout__checkbox-input-0").prop('checked', false);
			$("#checkout__checkbox-input-0").trigger('change');}
		else   { $("#calc_item_mod2").hide(); $("#calc_item_mod2").removeClass('calk-item'); }
		
	$("#checkout__checkbox-input-2").change(function() {
		if($("#checkout__checkbox-input-2").prop('checked'))
			{$("#calc_item_mod2").show(); $("#calc_item_mod2").addClass('calk-item'); 
				$("#checkout__checkbox-input-0").prop('checked', false);
			$("#checkout__checkbox-input-0").trigger('change');}
		else   { $("#calc_item_mod2").hide(); $("#calc_item_mod2").removeClass('calk-item'); }
	})
	/*mod3*/
	if($("#checkout__checkbox-input-3").prop('checked'))
		{$("#calc_item_mod3").show(); $("#calc_item_mod3").addClass('calk-item'); }
		else   { $("#calc_item_mod3").hide(); $("#calc_item_mod3").removeClass('calk-item'); }
		
	$("#checkout__checkbox-input-3").change(function() {
		if($("#checkout__checkbox-input-3").prop('checked'))
		{$("#calc_item_mod3").show(); $("#calc_item_mod3").addClass('calk-item'); 
			$("#checkout__checkbox-input-0").prop('checked', false);
			$("#checkout__checkbox-input-0").trigger('change');}
		else   { $("#calc_item_mod3").hide(); $("#calc_item_mod3").removeClass('calk-item'); }
	})
	

		$('#calc_item_full_program .quantity-number').change(function() {
			$(this).parent().next('.cart-item__price').html('<span>'+$(this).val()*<? echo $tr_price; ?>+'</span>'+' €');
			calcTotal();
		})
		
		$('#calc_item_mod1 .quantity-number').change(function() {
			$(this).parent().next('.cart-item__price').html('<span>'+$(this).val()*<? echo $mod_price1; ?>+'</span>'+' €');
			calcTotal();
		})
		
		$('#calc_item_mod2 .quantity-number').change(function() {
			$(this).parent().next('.cart-item__price').html('<span>'+$(this).val()*<? echo $mod_price2; ?>+'</span>'+' €');
			calcTotal();
		})
		
		$('#calc_item_mod3 .quantity-number').change(function() {
			$(this).parent().next('.cart-item__price').html('<span>'+$(this).val()*<? echo $mod_price3; ?>+'</span>'+' €');
			calcTotal();
		})
		
		calcTotal();
		
		$("#checkout__checkbox-input-3, #checkout__checkbox-input-1, #checkout__checkbox-input-2, #checkout__checkbox-input-0").change(function() {
			calcTotal();
		})
		
		
		/*functions*/
		function calcTotal() {
			let allTotalPprice = 0;
			
			var num_zakaz = 0;
			document.querySelectorAll(".calk-item .cart-item__price span").forEach(function (item) {
			num_zakaz++;
				switch (num_zakaz) {
				  case 1:
					$('#input_1_22').val($(item).text());
					break;
				  case 2:
					$('#input_1_23').val($(item).text());
					break;
				  case 3:
					$('#input_1_28').val($(item).text());
					break;
				  default:
				}
				allTotalPprice +=1*$(item).text();
			});
			
			num_zakaz = 0;
			document.querySelectorAll(".calk-item .quantity-number").forEach(function (item) {
			num_zakaz++;
				switch (num_zakaz) {
				  case 1:
					$('#input_1_21').val($(item).val());
					break;
				  case 2:
					$('#input_1_26').val($(item).val());
					break;
				  case 3:
					$('#input_1_27').val($(item).val());
					break;
				  default:
				}
				allTotalPprice +=1*$(item).text();
			});
			
			num_zakaz = 0;
			document.querySelectorAll(".calk-item .cart-item__title").forEach(function (item) {
			num_zakaz++;
				switch (num_zakaz) {
				  case 1:
					$('#input_1_19').val($(item).text());
					break;
				  case 2:
					$('#input_1_24').val($(item).text());
					break;
				  case 3:
					$('#input_1_25').val($(item).text());
					break;
				  default:
				}
			});
		$('.checkout__cart-total .cart-total__price>span').text(allTotalPprice);
		//$('#price-all-total').val(allTotalPprice);
		
		
		
		$('.ginput_container.ginput_container_singleshipping .gform_hidden').val('$'+allTotalPprice);
		$('#input_1_16').text('$'+allTotalPprice);
        }
     
	}) /*READY*/
</script>

<style>
	
	li#field_1_16 {
    display: none;
}

input#gform_submit_button_1 {
    width: 100%;
    margin-top: 20px;
    background: #000;
    color: #fff;
    text-align: center;
    display: flex;
    justify-content: center;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 14px;
    line-height: 21px;
    padding: 15px 10px;
}

	.cf7wpay_stripe:before {content: 'Notification : Ce formulaire traite les paiements de manière sécurisée via © Stripe . Les données de votre carte ne concernent jamais notre serveur';font-weight: 300;font-size: 16px;line-height: 20px;
/* or 125% */color: #000000;padding: 5px;display: block;margin: 10px 0;}


	/*.page-id-229 .wpcf7-response-output {
		display: block!important;
	}*/

span.wpcf7-form-control-wrap.payment {
    display: none;
}

input.wpcf7-form-control.wpcf7-text.wpcf7-validates-as-required.wpcf7-not-valid {
    border-bottom: 2px solid red;
}

input#stripe-submit {
    margin-top: -1em;
    background: #000;
    color: #fff;
    text-align: center;
    /* display: flex; */
    /* justify-content: center; */
    width: calc(100% - 10px);
    text-transform: uppercase;
    font-weight: 600;
    font-size: 14px;
    line-height: 21px;
    padding: 15px 10px;
    margin-left: 1px;
}

/*gr forms*/
li#field_1_8 {
    width: 48%;
    float: left;
}

input#input_1_8 {
    width: 100%;
}

li#field_1_9 {
    width: 48%;
    float: right; 
    margin-top: -3.3em;
}

li#field_1_6 {}

body .gform_wrapper ul li.gfield {margin-top: 0;}

body .gform_wrapper .top_label div.ginput_container {
    margin-top: 0;
}

.checkout__input input {
    height: 2em;
}
/*gr forms*/
	</style>
<?php get_footer(); ?>