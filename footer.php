			</div>
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/libs/moment.js" type="text/javascript"></script>
		<script src="js/CUI.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$('form').submit(function(event) {
				$('form .error').removeClass('error');
				var data = $('form').serializeArray();
				var error = false;
				for (var i in data) {
					if (data[i].name != "street2" && data[i].name != "notes" && data[i].value == '') {
						$('[name="' + data[i].name + '"]').addClass('error');
						error = true;
					}
				}
				if (error) {
					event.preventDefault();
				}
			});
		</script>
    </body>
</html>
