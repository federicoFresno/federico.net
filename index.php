<?phpfunction die404() {	include 'templates/404.php';
	die ();
}
$URL = str_replace(	array( '\\', '../' ),	array( '/',  '' ),	$_SERVER['REQUEST_URI']
);if ($offset = strpos($URL,'?')) {	$URL = substr($URL,0,$offset);} else if ($offset = strpos($URL,'#')) {	$URL = substr($URL,0,$offset);}
$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));
if (URL_ROOT != '/') $URL=substr($URL,strlen(URL_ROOT));
$URL = trim($URL,'/');
if (	file_exists(DOC_ROOT.'/'.$URL) &&	($_SERVER['SCRIPT_FILENAME'] != DOC_ROOT.$URL) &&	 ($URL != '') &&	 ($URL != 'index.php') &&	 ($URL != 'mail.php') &&	  ($URL != 'min')) die404();
$ACTION = (	($URL == '') ||	($URL == 'index.php') ||	($URL == 'index.html')
) ? array('default') : explode('/',html_entity_decode($URL));if (preg_replace('/[^\w\-]/','',$ACTION[0]) == 'mail'){	include 'mail.php';	die();}if (preg_replace('/[^\w\-]/','',$ACTION[0]) == 'min'){	include 'min/index.php';	die();}function sanitize_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );
    $replace = array(
        '>',
        '<',
        '\\1'
    );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

ob_start("sanitize_output");$includeFile = 'templates/'.preg_replace('/[^\w\-]/','',$ACTION[0]).'.php';$title='Federico Consulting - ' . ucwords(str_replace("-"," ",$ACTION[0]));switch (strtolower($ACTION[0])) {	case 'about':		$description = 'Federico Consulting offers IT Solutions in the Fresno area. We provide the most advanced information technology solutions at a reasonable cost.';		break;	case 'backup':		$description = 'Federico Consulting offers Backup Solutions in the Fresno area. Incremental, replications, NAS backups, Off-Site storage & workstation imaging';		break;	case 'business-continuity':		$description = 'Get your server operations restored in less than 30 min. Data recovery, disaster planning, Federico Consulting offers IT services in the Fresno area. ';		break;	case 'case-study':		$description = 'Federico Consulting offers IT Solutions in the Fresno area. Learn about a business that accelerated thanks to Federico Consulting.';		break;	case 'contact':			$description = 'Federico Consulting offers IT Solutions in the Fresno area. Contact us now, give us a call 559-224-5922 or stop by the office.';			break;	case 'get-started':		$description = 'Federico Consulting offers IT Solutions in the Fresno area. Get started to with a free consultation!';		break;	case 'it-solutions':		$description = 'Federico offers IT Solutions and IT Consulting for businesses in the Fresno area. Network, server management, system backup, optimization and HP support';		break;	case 'it':		$description = 'Federico Consulting offers IT solutions for businesses in the Fresno area. Networking, server management, system backup, network optimization and HP support';		break;	case 'managed-services':		$description = 'Federico offers full IT managed services in the Fresno area. Network setup & monitoring, web filtering, backups, AD management, reporting, phone systems, ';		break;	case 'phone-systems':		$description = 'We offer Phone Systems and Telecom solutions for businesses in the Central Valley and Fresno area. Avaya, Nortel, Unified, VOIP, PBX, Polycom, Comcast & wiring';		break;	case 'total-care':		$description = 'Federico Consulting offers IT managed services in the Central Valley and Fresno area. Network setup & monitoring, web filtering, backups, AD management, reports';		break;	default:		$description = 'Federico Consulting is a Fresno IT solutions company offering telecom, phone, networking, IT management, system backup and security solutions to businesses. ';		break;}if ( ucwords(str_replace("-"," ",$ACTION[0])) == 'Default')  $title = 'Federico Consulting';
include 'templates/partials/head.php';if (is_file($includeFile)) {	include($includeFile);} else {	include 'templates/front.php';}
include 'templates/partials/foot.php';

ob_end_flush("sanitize_output");
?>
