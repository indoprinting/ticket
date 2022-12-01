	<script type="text/javascript">
		$(document).ready(function() {
		  	// clockUpdate();
		  	// setInterval(clockUpdate, 1000);
		  	notifUpdate();
		  	setInterval(notifUpdate, 60000);

		
			$( "#notification" ).click(function() {
				if ($(this).hasClass("open")) {
					$.ajax({
						method: "POST",
						url: "<?php echo base_url(); ?>user/readnotif/<?php echo $this->session->userID; ?>",
						success: function(data) {
							$('.notif-new').hide();
						}
					});
				}
			});
		});

		function clockUpdate() {
			var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
			var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

		  	var date = new Date();
		  	$('.digital-clock').css({'color': '#fff', 'text-shadow': '0 0 6px #ff0'});
		  	
		  	function addZero(x) {
			    if (x < 10) {
			      return x = '0' + x;
			    } else {
			      return x;
			    }
		  	}

			var y = date.getFullYear();
			var m = month[date.getMonth()];
			var d = date.getDate();
			var w = days[date.getDay()];
		  	var h = addZero(date.getHours());
		  	var i = addZero(date.getMinutes());
		  	var s = addZero(date.getSeconds());

		  	$('#today').text(m + ' '+ d + ', ' + y );
		  	$('#jam').text(w + ', '+ h + ':' + i + ':' + s);
		}

		function notifUpdate() {
			if (!$('#notification').hasClass("open")) {
				$.ajax({
					method: "POST",
					url: "<?php echo base_url(); ?>user/getnotif/<?php echo $this->session->userID; ?>",
					success: function(data) {
						$('#notification').html(data);
					}
				});
			}
		}
	</script>

</body>

</html>