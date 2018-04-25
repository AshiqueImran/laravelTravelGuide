		<?php
		require_once('voicerss_tts.php');

		

		function getVoice($text){

			$tts = new VoiceRSS;
			$voice = $tts->speech([
			    'key' => 'a668fcd80c3a498fb8eac9ddeea22b2c',//'<API key>'
			    'hl' => 'en-us',
			    'src' => $text,
			    'r' => '0',
			    'c' => 'mp3',
			    'f' => '44khz_16bit_stereo',
			    'ssml' => 'false',
			    'b64' => 'true'
			]);

			return  $voice['response'];
			}
				
		?>