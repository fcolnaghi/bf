<script type="text/javascript" src="<?php echo ROOT?>assets/javascripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo ROOT?>assets/javascripts/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo ROOT?>assets/javascripts/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT?>assets/javascripts/jquery.maskMoney.js"></script>
<script type="text/javascript" src="<?php echo ROOT?>assets/javascripts/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo ROOT?>assets/javascripts/application.js"></script>
<script>
var ROOT = '<?php echo ROOT;?>';
$(document).ready(function($){
   $(".date").mask("99/99/9999");
   $(".phone").mask("(999) 999-9999");
   $(".tel").mask("(99) 9999-9999");
   $('.qtd').mask('0000');
   $('.money').maskMoney({
	   	thousands: '.',
		decimal: ','
	});
});
</script>