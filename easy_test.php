<script>
	var isExecuting = false;
	$(document).on('keydown touchstart', function(event) {
		if (isExecuting) {
			return;
		}
		isExecuting = true;
		if (event.keyCode == 32) {
			event.preventDefault();
		}
		var char;
		if (event.type === 'keydown') {
			char = String.fromCharCode(event.which).toUpperCase();
		} else if (event.type === 'touchstart' && $(event.target).hasClass('keyboard')) {
			char = $(event.target).text();
		} else if (event.type === 'touchstart' && $(event.target).hasClass('backspace')) {
			char = 'backspace';
		}
		var spot = parseInt($("#spot").val());
		var next = parseInt($("#next").val());
		var previous = parseInt($("#previous").val());
		var last = parseInt($("#last").val());
		var last_letter = $("#last_letter").val();
		if (event.which === 8 || char === 'backspace') {
			if(spot == last && last_letter != '') {
				$('#tile-' + spot).css('background-color', '#FFFFDA');
				$('#tile-' + spot).text("");
				$("#last_letter").val("");
			} else if(spot == last && last_letter === '') {
				$('#tile-' + previous).css('background-color', '#FFFFDA');
				$('#tile-' + last).css('background-color', '#FFFFFF').removeClass("b2-90EE90 pp-b-90EE90 b2-EAEAEA pp-b-EAEAEA").addClass("b2-D3D3D3 pp-b-D3D3D3");
				$('#tile-' + previous).text("");
				$("#spot").val(previous);
				if(previous - 1 > 0) {
					$("#previous").val(previous - 1);
				} else {
					$("#previous").val(0);
				}
				$("#next").val(next);
			} else {
				$('#tile-' + spot).css('background-color', '#FFFFFF').removeClass("b2-90EE90 pp-b-90EE90 b2-EAEAEA pp-b-EAEAEA").addClass("b2-D3D3D3 pp-b-D3D3D3");
				$('#tile-' + previous).text("");
				$('#tile-' + previous).css('background-color', '#FFFFDA');
				$("#spot").val(previous);
				if(previous+1 < last) {
					$("#next").val(previous+1);
				}
				if(previous - 1 > 0) {
					$("#previous").val(previous - 1);
				} else {
					$("#previous").val(0);
				}
			}
			if(spot == 0) {
				$('#tile-' + spot).css('background-color', '#FFFFFF').removeClass("b2-90EE90 pp-b-90EE90 b2-EAEAEA pp-b-EAEAEA").addClass("b2-D3D3D3 pp-b-D3D3D3");
			}
		} else {
			if (/^[A-Z]$/.test(char)) {
				$('#tile-' + spot).text(char);
				$('#tile-' + next).css('background-color', '#FFFFDA');
				$('#tile-' + spot).css('background-color', '#FFFFFF');
				$('#tile-' + spot).css('background-color', '#FFFFFF');
				if(spot == last) {
					$("#last_letter").val(char);
					var answer = '';
					<?php $a=0;$b=0;while($a<$count_characters) { 
						$character = $characters[$a];
						if(!ctype_alpha($character)) $a++;
						if(!ctype_alpha($character)) continue;
						if(ctype_alpha($character)) { ?>
						var letter = $('#tile-<?php echo $b; ?>').val();
						answer += letter;
						<?php $b++;} $a++;} ?>
					var lowercase = answer.toLowerCase();
					if(lowercase == "<?php echo strtolower($abc_answer); ?>") {
						/* success */
						<?php $a=0;$b=0;while($a<$count_characters) { 
							$character = $characters[$a];
							if(!ctype_alpha($character)) $a++;
							if(!ctype_alpha($character)) continue;
							if(ctype_alpha($character)) { ?>
							$('#tile-<?php echo $b; ?>').transition({
								  perspective: '10000px',
								  rotateY: '360deg',
								  duration: 600,
								  complete: function() {
									$(this).css('background-color', '#37C936');
								  }
								});
							$('#tile-<?php echo $b; ?>').css('backgroundColor', '#37C936').css('borderColor', '#FFFFFF');
							<?php $b++;} 
						   $a++;} ?>
						var username = "<?php echo urlencode($username); ?>";
						var current_verse = "<?php echo urlencode($current_verse); ?>";
						var current_verse_creator = "<?php echo urlencode($current_verse_creator); ?>";
						var current_verse_id = <?php echo $current_verse_id; ?>;
						var verse_count = <?php echo $count_verses; ?>;
						$.ajax({
							url: '<?php echo $url; ?>process/verses/save_answer.php',
							type: 'POST',
							data : { username:username,current_verse:current_verse,current_verse_creator:current_verse_creator,current_verse_id:current_verse_id,verse_count:verse_count },
							success : function(data) {
								if (data == 1) {
									setTimeout(function() {
									window.location.reload(true);
									}, 300);
								}
							},
							  error: function() {
							}
						});
						var correct = 'yes';
						var id = <?php echo $id; ?>;
						$.ajax({
							url: '<?php echo $url; ?>process/verses/save_verse_stats.php',
							type: 'POST',
							data : { current_verse:current_verse,id:id,current_verse_creator:current_verse_creator,correct:correct },
							success : function(data) {
							},
							  error: function() {
							}
						});								
					} else {
						// failed
						<?php $a=0;$b=0;while($a<$count_characters) {
							$character = $characters[$a];
							if(!ctype_alpha($character)) $a++;
							if(!ctype_alpha($character)) continue;
							if(ctype_alpha($character)) { ?>
							$('#tile-<?php echo $b; ?>').effect("shake", { distance: 8, times: 2 }, 400);
							<?php $b++;}$a++;} ?>
						var current_verse = "<?php echo urlencode($current_verse); ?>";
						var current_verse_creator = "<?php echo urlencode($current_verse_creator); ?>";
						var correct = 'no';
						var id = <?php echo $id; ?>;
						$.ajax({
							url: '<?php echo $url; ?>process/verses/save_verse_stats.php',
							type: 'POST',
							data : { current_verse:current_verse,id:id,current_verse_creator:current_verse_creator,correct:correct },
							success : function(data) {
							},
							  error: function() {
							}
						});
					}				
				}
				$("#spot").val(next);
				if(next+1 > last) {
					$("#next").val(last);
				} else {
					$("#next").val(next+1);
				}
				if(next > 1) {
					$("#previous").val(next-1);
				} else {
					$("#previous").val(0);
				}
				var correct_tile = $('#correct-tile-' + spot).val().toLowerCase();
				var guess_tile = $('#tile-' + spot).text().toLowerCase();
				if(correct_tile == guess_tile) {
					$('#tile-' + spot).css('backgroundColor', '#90EE90').removeClass("b2-D3D3D3 pp-b-D3D3D3").addClass("b2-90EE90 pp-b-90EE90");
				} else {
					$('#tile-' + spot).css('backgroundColor', '#FFFFE0').removeClass("b2-D3D3D3 pp-b-D3D3D3").addClass("b2-EAEAEA pp-b-EAEAEA");
				}
				
			}
		}
		isExecuting = false;
	});
	
	$('.reveal').click(function () {
		$(this).text("<?php echo strtoupper($answer); ?>");
	});
	
	$(document).ready(function() {
		$('.keyboard').on('touchstart', function() {
			$(this).removeClass('bg-E0E0E0 b-E0E0E0').addClass('bg-555555 b-646464');
		}).on('touchend touchcancel', function() {
			$(this).removeClass('bg-555555 b-646464').addClass('bg-E0E0E0 b-E0E0E0');
		});
	});
	$(document).ready(function() {
		$('.backspace').on('touchstart', function() {
			$(this).removeClass('bg-E0E0E0 b-E0E0E0').addClass('bg-555555 b-646464');
		}).on('touchend touchcancel', function() {
			$(this).removeClass('bg-555555 b-646464').addClass('bg-E0E0E0 b-E0E0E0');
		});
	});

	document.ondblclick = function(e) {
		e.preventDefault();
	}
	
</script>