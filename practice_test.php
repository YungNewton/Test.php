<?php $css = 'b2-90EE90 pp-b-90EE90 b2-EAEAEA pp-b-EAEAEA'; ?>
	
<style>
@keyframes rotateAndColor{0%{transform:rotate(0deg);background-color:transparent;}100%{transform:rotate(360deg);background-color:#37C936;}}.rotate-once{animation:rotateAndColor 1s ease-in-out forwards;}.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 240px;
  background-color: #000;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  transform: translateX(-50%);
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
	
<div class='<?php $sam = 'float w100 mt180 pp-mt72';echo $sam;$css .= ' ' . $sam; ?>'>

	<h1 class='<?php $sam = 'float w100 pad05 pp-pad03 title-font dark tfont900 text32 pp-text15 text-center';echo $sam;$css .= ' ' . $sam; ?>'><?php echo $verse; ?></h1>

	<div class='<?php $sam = 'float w100 mt24 pp-mt12 pad05 pp-pad0 text-center';echo $sam;$css .= ' ' . $sam; ?>'>

		<input type='hidden' id='spot' value="0"/>
		<input type='hidden' id='next' value="1"/>
		<input type='hidden' id='previous' value="0"/>
		<input type='hidden' id='last' value="<?php echo $count_abc_characters - 1; ?>"/>
		<input type='hidden' id='last_letter' value=""/>
		<input type="text" id="foo" class="<?php $sam = 'border-none outline-none bg-FFFFFF color-FFFFFF';echo $sam;$css .= ' ' . $sam; ?>" style="position: absolute; left: -9999px; top: -9999px;">
		
	
		<?php $a=0;$b=0;$c=0;while($a<$count_characters) { 
			$character = $characters[$a];
			
			$css_char = css_code_for_non_abc_character($character);
			
			
			$line_break = determine_line_break($a,$c, $character);
			$c = reset_c_for_a_new_line_break($c, $line_break);
			
			echo $line_break;
			?>
			
			<?php if($character == ' ') { ?>
				<div class='<?php $sam = 'inline-block mr24 pp-mr12';echo $sam;$css .= ' ' . $sam; ?>'></div>
			<?php } elseif(!ctype_alpha($character)) { ?>
				<div class='<?php $sam = 'inline-block title-font tfont900 pp-tfont600 text40 pp-text10 color-000000 uc';echo $sam;$css .= ' ' . $sam; ?>'>
					<?php echo $character; ?>
				</div>
			<?php } else { ?>
				<div class='<?php $sam = 'inline-block';echo $sam;$css .= ' ' . $sam; ?>' style='vertical-align: top;'>
					<div id="tile-<?php echo $b; ?>" class='<?php $sam = 'w50px h50 pp-w20px pp-h20 mr8 pp-mr2 pp-pt2 mb12 pp-mb8 b2-D3D3D3 pp-b-D3D3D3 text-center title-font tfont900 pp-tfont600 text40 pp-text14 color-000000 uc cursor pp-br1';echo $sam;$css .= ' ' . $sam; ?> tile'></div>
					<input type='hidden' id="correct-tile-<?php echo $b; ?>" class='correct-tile' value="<?php echo $character; ?>"/>
				</div>
				<script>
					$('#tile-<?php echo $b; ?>').click(function() {
						$(this).css('background-color', '#FFFFDA');
						$(this).val(""); // Clear existing content when clicked
					});
				</script>
			<?php } ?>
			
		<?php
			if($a+1 == $count_characters) echo "</div>";
			if(ctype_alpha($character)) $b++;
			if(ctype_alpha($character)) $c++;
			$a++;}?>
		
	
	<div class='<?php $sam = 'float w100 mt96 pp-mt24 text-center';echo $sam;$css .= ' ' . $sam; ?>'>
		<p class='<?php $sam = 'float w100 paragraph-font pfont400 color-000000 text16 pp-text14 lh1-5 text-center';echo $sam;$css .= ' ' . $sam; ?>'><?php echo $current_verse; ?> <?php echo $current_verse_id+1; ?> of <?php echo $count_verses; ?></p>
		<div class='<?php $sam = 'float w100 mt4 pp-mt2 text-center';echo $sam;$css .= ' ' . $sam; ?>'>
			<p class='<?php $sam = 'inline-block paragraph-font pfont400 color-000000 text16 pp-text14 lh1-5';echo $sam;$css .= ' ' . $sam; ?>'>Hit Percentage: <?php echo $hit_percentage; ?>% <div class='<?php $sam = 'inline-block pl8';echo $sam;$css .= ' ' . $sam; ?> tooltip'><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" title="Tooltip text"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M352 192c0-88.4-71.6-160-160-160S32 103.6 32 192c0 15.6 5.4 37 16.6 63.4c10.9 25.9 26.2 54 43.6 82.1c34.1 55.3 74.4 108.2 99.9 140c25.4-31.8 65.8-84.7 99.9-140c17.3-28.1 32.7-56.3 43.6-82.1C346.6 229 352 207.6 352 192zm32 0c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192zM104.7 137.8c6.5-24.6 28.7-41.8 54.2-41.8H216c35.5 0 64 29 64 64.3c0 24-13.4 46.2-34.9 57.2L208 236.3V256c0 8.8-7.2 16-16 16s-16-7.2-16-16V226.5c0-6 3.4-11.5 8.7-14.3l45.8-23.4c10.7-5.4 17.5-16.6 17.5-28.7c0-17.8-14.4-32.3-32-32.3H158.9c-10.9 0-20.5 7.4-23.2 17.9l-.2 .7c-2.2 8.5-11 13.7-19.5 11.4s-13.7-11-11.4-19.5l.2-.7zM168 320a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/></svg><span class="tooltiptext">This is our percentage of how many failed attempts vs correct guesses for this scripture amongst all users who tried this scripture.</span></p>
			</div>
		</div>
		<div class='<?php $sam = 'float w100 mt4 pp-mt2 text-center';echo $sam;$css .= ' ' . $sam; ?>'>
			<p class='<?php $sam = 'inline-block paragraph-font pfont400 color-000000 text16 pp-text14 lh1-5';echo $sam;$css .= ' ' . $sam; ?> reveal'>Reveal Scripture</p>
		</div>
	</div>
	
</div>

<div class='<?php $sam = 'absolute display-none tlp-display tll-display pp-display pl-display';echo $sam;$css .= ' ' . $sam; ?>' style="bottom:0%;width:100%;left:0%;background-color:#333333;">
	<div class='<?php $sam = 'float w100 mt32 pr4 pl4 text-center';echo $sam;$css .= ' ' . $sam; ?>'>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">Q</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">W</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">E</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">R</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">T</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">Y</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">U</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">I</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">O</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">P</div>
	</div>
	<div class='<?php $sam = 'float w100 mt32 pr4 pl4 text-center';echo $sam;$css .= ' ' . $sam; ?>'>
		<div class="<?php $sam = 'float h58 w4-7 mr1 ml1 bg-transparent border-none br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?>"></div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">A</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">S</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">D</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">F</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">G</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">H</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">J</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">K</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">L</div>
		<div class="<?php $sam = 'float h58 w4-7 mr1 ml1 bg-transparent border-none br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?>"></div>
	</div>
	<div class='<?php $sam = 'float w100 mt32 mb32 pr4 pl4 text-center';echo $sam;$css .= ' ' . $sam; ?>'>
		<div class="<?php $sam = 'float h58 w4-7 mr1 ml1 bg-transparent border-none br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?>"></div>
		<div class="<?php $sam = 'float h58 w4-7 mr1 ml1 bg-transparent border-none br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?>"></div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">Z</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">X</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">C</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">V</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">B</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">N</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> keyboard">M</div>
		<div class="<?php $sam = 'float h58 w9-4 mr1 ml1 bg-E0E0E0 b-E0E0E0 br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?> backspace"><?php echo $backspace_icon; ?></div>
		<div class="<?php $sam = 'float h58 w4-7 mr1 ml1 bg-transparent border-none br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?>"></div>
		<div class="<?php $sam = 'float h58 w4-7 mr1 ml1 bg-transparent border-none br8 pt16 title-font tfont400 text16 color-333333 text-center';echo $sam;$css .= ' ' . $sam; ?>"></div>
	</div>
</div>
	
<?php
	
	if($mode == 'live' && $difficulty == 'easy') include($_SERVER['DOCUMENT_ROOT'] . '/extensions/verses/practice/difficulty/easy_live.php');
	if($mode == 'test' && $difficulty == 'easy') include($_SERVER['DOCUMENT_ROOT'] . '/extensions/verses/practice/difficulty/easy_test.php');
	
	if($mode == 'live' && $difficulty == 'hard') include($_SERVER['DOCUMENT_ROOT'] . '/extensions/verses/practice/difficulty/hard_live.php');
	if($mode == 'test' && $difficulty == 'hard') include($_SERVER['DOCUMENT_ROOT'] . '/extensions/verses/practice/difficulty/hard_test.php');

?>


<?php

$directory = 'practice';
$file = 'practice_test.php';

$class_names = insert_css_build($css, $page, $directory, $file, $db);

$directory = 'extra css';
insert_extra_css_build($class_names, $css, $page, $directory, $file, $db);

?>