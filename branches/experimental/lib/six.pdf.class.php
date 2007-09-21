<?php
define(SIX_ROOT, '/var/www/genlu_stable');
require_once(SIX_ROOT . '/include/fpdf153/fpdf.php');

class SIX_PDF extends FPDF {
	protected $logo;
	private $data = null;
	private $x1;
	private $y1;
	private $x2;
	private $y2;
	private $maxlines = 25;
	private $cols = array('Reference' => 45, 
		'Description' => null, 
		'Qty' => 15, 
		'Unit Price' => 25, 
		'Amount' => 25
	);
	private $showBarcode = true;
	private $barcode = null;

	public function __construct($orientation='P',$unit='mm',$format='Letter'){
		parent::__construct($orientation, $unit, $format);
		$this->logo = SIX_ROOT . '/templates/invoices/logos/logo2.jpg';
		$descWidth = $this->w - $this->lMargin - $this->rMargin - 110;
		$this->cols['Description'] = $descWidth;
	}

	/**
	 *	@param array $data = array(
	 *		'invoiceNumber' => 'number',
	 *		'date' => 'date',
	 *		'dueDate' => 'date',
	 *		'shippingMethod' => 'method',
	 *		'terms' => 'terms',
	 *		'soldTo' => array(
	 *			'name' => 'companyName', 
	 *			'details' => 'address1\naddress2\nphone\netc'
	 *			),
	 *		'shipTo' => array(
	 *			'name' => 'companyName', 
	 *			'details' => 'address1\naddress2\nphone\netc'
	 *			)
	 */
	/*{{{ Header */
	public function Header(){
		// Image($file,$x,$y,$w=0,$h=0,$type='',$link='')
		// Cell($w,$h=0,$txt='',$border=0,$ln=0,$align='',$fill=0,$link='')
		// MultiCell($w,$h,$txt,$border=0,$align='J',$fill=0)
		if(!$this->data)
			throw new Excepcion('No data supplied.');
		$x = $this->getX();
		$y = $this->getY();
		# Logo
		$this->Image($this->logo, $x, $y, 60);
		$this->x1 = $x;
		$this->y1 = $y + 13;
		$this->x2 = $this->w - 60;
		$this->y2 = $y;
		# Invoice & Number
		$this->setX($this->x2);
		$this->SetFont('Arial','B',32);
		$this->Cell(50, 10, 'Invoice', 0, 1, 'R');
		$this->SetFont('Arial','B',22);
		$this->y2 += 12;
		$this->setXY($this->x2, $this->y2);
		$this->Cell(50, 5, '# ' . $this->data['invoiceNumber'], 0, 1, 'R');
		$this->y2 += 8;
		# Company details
		$this->setXY($this->x1, $this->y1);
		$this->SetFont('Arial','',14);
		$width = 75;
		$details = "Genlu L.L.C.\nMiami - Florida - USA\nPhone: 786-975-4482\ngenludistributors@gmail.com";
		$this->MultiCell($width, 6, $details, 0, 'L');
		$this->y1 += 8;
		# Date 
		$this->setXY($this->x2, $this->y2);
		$this->SetFont('Arial','',14);
		$width = $this->getStringWidth('Date: ') + 5;
		$x21 = $this->x2;
		$this->Cell($width, 5, 'Date: ', 0, 0, 'R');
		$x22 = $this->getX();
		$this->Cell(0, 5, $this->data['date'], 0, 1, 'R');
		$this->y2 += 6;
		# Due Date
		$this->setXY($x21, $this->y2);
		$this->Cell($width, 5, 'Due Date: ', 0, 0, 'R');
		$this->setX($x22);
		$this->Cell(0, 5, $this->data['dueDate'], 0, 1, 'R');
		$this->y2 += 6;
		# Page number
		$this->setXY($x21, $this->y2);
		$this->Cell($width, 5, 'Page: ', 0, 0, 'R');
		$this->setX($x22);
		$page = sprintf("%02d", $this->PageNo());
		// $total = sprintf("%02d", "{nb}");
		// $pageStr = $page . " of {nb}"; 
		$this->Cell(0, 5, $page, 0, 1, 'R');
		$this->y2 += 6;
		# Divider
		$y = ($this->y1 > $this->y2 ? $this->y1 : $this->y2) + 2;
		$this->setY($y);
		$this->setX($this->lMargin);
		$this->setLineWidth(0.5);
		$this->Cell(0, 1, '', 'T', 1);
		# Reset Position
		$this->y1 = $this->getY() + 5;
		$this->y2 = $this->y1;
		$this->x1 = $this->getX();
		$this->x2 = $this->x1;
		# Sold To
		$this->setFont('Arial', 'B', 14);
		$this->setXY($this->x1, $this->y1);
		$width = 50;
		$this->Cell($width, 5, 'Sold To:', 0, 0, 'L');
		$this->y1 += 5;
		# Ship To
		$this->x2 = $this->w - $width - $this->rMargin;
		$this->setX($this->x2);
		$this->Cell($width, 5, 'Ship To:', 0, 0, 'L');
		$this->y2 += 5;
		# Company (sold to)
		$this->setFont('Arial', 'B', 11);
		$lpadding = 2;
		$this->x1 += $lpadding;
		$this->setXY($this->x1, $this->y1);
		// $soldTo = 'Time Square';
		$width = $this->getStringWidth($soldTo);
		$this->Cell($width, 5, $this->data['soldTo']['name'], 0, 1, 'L');
		$this->y1 += 6;
		# Company (ship to)
		$this->x2 += $lpadding;
		$this->setXY($this->x2, $this->y2);
		// $shipTo = 'Time Square';
		$width = $this->getStringWidth($shipTo);
		$this->Cell($width, 5, $this->data['shipTo']['name'], 0, 1, 'L');
		$this->y2 += 6;
		# Address SoldTo
		$this->setFont('Arial', '', 10);
		$lpadding = 3;
		$this->x1 += $lpadding;
		$this->setXY($this->x1, $this->y1);
		// $soldToAddress = "Dadeland Mall\nMiami - FL (USA)\nPhone: 305-379-7988\nFax: 305-379-7989";
		$this->MultiCell(75, 4, $this->data['soldTo']['details'], 0, 'L');
		$this->y1 = $this->getY() + 5;
		# Address ShipTo
		$this->setFont('Arial', '', 10);
		$lpadding = 3;
		$this->x2 += $lpadding;
		$this->setXY($this->x2, $this->y2);
		// $shipToAddress = "Dadeland Mall\nMiami - FL (USA)\nPhone: 305-379-7988\nFax: 305-379-7989";
		$this->MultiCell(75, 4, $this->data['shipTo']['details'], 0, 'L');
		$this->y2 = $this->getY() + 5;
		# Rect($x,$y,$w,$h,$style='')
		$this->setFillColor(245);
		$this->setLineWidth(0.2);
		$width = ($this->w - $this->rMargin - $this->lMargin) / 2;
		$this->Rect($this->lMargin, $this->y1 - 1, $width, 7, 'DF');
		$x = $this->getX() + $width;
		$this->Rect($x, $this->y1 - 1, $width, 7, 'DF');
		# Shipping Method
		$this->setFont('Arial', '', 11);
		$this->x1 = $this->lMargin;
		$lpadding = 2;
		$this->setXY($this->x1 + $lpadding, $this->y1);
		$this->Cell(40, 5, 'Shipping Method:', 0, 0, 'L');
		$this->setFont('Arial', '', 10);
		// $shmethod = 'UPS Ground';
		$this->Cell(55, 5, $this->data['shippingMethod'], 0, 0, 'L');
		$this->y1 = $this->getY() + 5;
		# Terms
		$this->x2 = $this->w -95 - $this->rMargin;
		$this->setX($this->x2);
		$this->setFont('Arial', '', 11);
		$this->Cell(40, 5, 'Terms:', 0, 0, 'L');
		$this->setFont('Arial', '', 10);
		// $terms = 'COD 30 Days';
		$this->Cell(55, 5, $this->data['terms'], 0, 1, 'L');
		$this->y2 = $this->getY() + 5;
		# Divider
		// $y = ($this->y1 > $this->y2 ? $this->y1 : $this->y2) + 2;
		// $this->setY($y);
		// $this->setX($this->lMargin);
		// $this->setLineWidth(0.5);
		// $this->Cell(0, 1, '', 'T', 1);
		# Lines Header
		$this->setXY($this->lMargin, $this->y1);
		$x = $this->getX();
		$y = $this->getY() + 5;
		$this->setY($y);
		$this->setFont('Arial', 'B', 9);
		foreach($this->cols as $col => $width){
			# Rect($x,$y,$w,$h,$style='')
			# Cell($w,$h=0,$txt='',$border=0,$ln=0,$align='',$fill=0,$link='')
			if($col == 'Reference' || $col == 'Description')
				$align = 'L';
			else
				$align = 'R';
			$this->setX($x);
			$this->Rect($x, $y, $width, 5, 'DF');
			$this->Cell($width, 5, $col, 0, 0, $align);
			$x += $width;
		}
		$this->Ln();
		$this->x1 = $this->lMarging;
		$this->y1 = $this->getY();
		$this->x2 = $this->x1;
		$this->y2 = $this->y1;
		$this->setFillColor(255, 255, 255);
	}
	/*}}}*/
	/*{{{ Footer */
	function Footer(){

		$this->setX($this->lMargin);
		$this->setY(-20);
		$this->x1 = $this->getX();
		$this->y1 = $this->getY();
		$width = $this->w - $this->lMargin - $this->rMargin;
		$this->setFillColor(255, 255, 255);
		$this->Rect($this->x1, $this->y1, $width, 15, 'D');
		$this->setXY($this->x1, $this->y1);
		$this->setFont('Arial', 'B', 11);
		$this->Cell(20, 5, 'Notes:', 0, 0, 'L');
		$this->setX($this->x1 + 30);
		$this->setFont('Arial', '', 10);
		$this->MultiCell(0, 5, $this->data['invoice']['note'], 0, 'J');
	}
	/*}}}*/

	public function showLines(){
		$this->x1 = $this->lMargin;
		$this->setXY($this->x1, $this->y1);
		$this->setFont('Arial', '', 10);
		$x = $this->x1;
		$y = $this->y1;
		for($i=0; $i < $this->maxlines; $i++){
			foreach($this->cols as $col => $width){
				if($col == 'Reference' || $col == 'Description')
					$align = 'L';
				else
					$align = 'R';
				$this->setX($x);
				$this->Rect($x, $y, $width, 5, 'D');
				$this->Cell($width, 5, $col, 0, 0, $align);
				$x += $width;
			}
			$this->Ln();
			$x = $this->lMargin;
			$this->setX($x);
			$y += 5;
			$this->setY($y);
		}
		$this->showTotals();
	}

	private function showTotals(){
		$this->x2 = $this->w - $this->rMargin - 65;
		$this->y2 = $this->getY() + 2;
		$this->setY($this->y2);
		$this->setX($this->x2);
		$this->setFillColor(245);
		$this->setFont('Arial', 'B', 11);
		# Labels
		$this->Cell(30, 5, 'Subtotal', 1, 1, 'L', 1);
		$this->setX($this->x2);
		$this->Cell(30, 5, 'Tax', 1, 1, 'L', 1);
		$this->setX($this->x2);
		$this->Cell(30, 5, 'Freight', 1, 1, 'L', 1);
		$this->setX($this->x2);
		$this->Cell(30, 5, 'TOTAL', 1, 1, 'L', 1);
		# Data
		$this->x2 = $this->w - $this->rMargin - 35;
		$this->setY($this->y2);
		$this->setX($this->x2);
		$this->Cell(35, 5, 'Subtotal', 1, 1, 'R', 1);
		$this->setX($this->x2);
		$this->Cell(35, 5, 'Tax', 1, 1, 'R', 1);
		$this->setX($this->x2);
		$this->Cell(35, 5, 'Freight', 1, 1, 'R', 1);
		$this->setX($this->x2);
		$this->Cell(35, 5, 'TOTAL', 1, 0, 'R', 1);
		$this->y1 = $this->getY();
		# Barcode
		if($this->showBarcode){
			$this->barcode = $this->data['invoiceNumber'];
			$this->x1 = $this->lMargin;
			$this->setXY($this->x1, $this->y2);
			// writeBarcode($x, $y, $w, $h, $type, $style, $font, $xres, $code)
			$type = 'C128B';
			$this->writeBarcode($this->x1, $this->y2, 100, 13, $type, '', 5, 1, $this->barcode);
		}
		# Total Quantity
		$this->x1 = $this->lMargin;
		$this->setY($this->y1);
		$this->setX($this->x1);
		$this->Cell(50, 5, 'Total Quantity:', 1, 0, 'L', 1);
		$this->Cell(20, 5, '54', 1, 1, 'R', 0);
	}

	public function setData($data){
		if(!$data || !is_array($data) || empty($data))
			throw new Exception('Supplied data is invalid.');
		$this->data = $data;
	}
	/**
	 * Set document barcode.
	 * @param string $bc barcode
	 */
	public function setBarcode($bc="") {
		$this->barcode = $bc;
	}

	/**
	 * Print Barcode.
	 * @param int $x x position in user units
	 * @param int $y y position in user units
	 * @param int $w width in user units
	 * @param int $h height position in user units
	 * @param string $type type of barcode (I25, C128A, C128B, C128C, C39)
	 * @param string $style barcode style
	 * @param string $font font for text
	 * @param int $xres x resolution
	 * @param string $code code to print
	 */
	public function writeBarcode($x, $y, $w, $h, $type, $style, $font, $xres, $code) {
		require_once(SIX_ROOT . "/include/barcode/barcode.php");
		require_once(SIX_ROOT . "/include/barcode/i25object.php");
		require_once(SIX_ROOT . "/include/barcode/c39object.php");
		require_once(SIX_ROOT . "/include/barcode/c128aobject.php");
		require_once(SIX_ROOT . "/include/barcode/c128bobject.php");
		require_once(SIX_ROOT . "/include/barcode/c128cobject.php");

		if (empty($code)) {
			return;
		}

		if (empty($style)) {
			// $style  = BCS_DRAW_TEXT;
			$style = BCS_ALIGN_LEFT;
			$style |= BCS_IMAGE_PNG;
			// $style |= BCS_TRANSPARENT;
			// $style |= BCS_STRETCH_TEXT;
			// $style |= BCS_BORDER;
			//$style |= BCS_REVERSE_COLOR;
		}
		if (empty($font)) {$font = BCD_DEFAULT_FONT;}
		if (empty($xres)) {$xres = BCD_DEFAULT_XRES;}

		$scale_factor = 1.5 * $xres * $this->k;
		$bc_w = round($w * $scale_factor); //width in points
		$bc_h = round($h * $scale_factor); //height in points

		// $obj = new C128BObject($bc_w, $bc_h, $style, $code);
		switch (strtoupper($type)) {
		case "I25": {
			$obj = new I25Object($bc_w, $bc_h, $style, $code);
			break;
		}
		case "C128A": {
			$obj = new C128AObject($bc_w, $bc_h, $style, $code);
			break;
		}
		case "C128B": {
			$obj = new C128BObject($bc_w, $bc_h, $style, $code);
			break;
		}
		case "C128C": {
			$obj = new C128CObject($bc_w, $bc_h, $style, $code);
			break;
		}
		case "C39": {
			$obj = new C39Object($bc_w, $bc_h, $style, $code);
			break;
		}
		default: {
			$obj = new C128BObject($bc_w, $bc_h, $style, $code);
		}
		}

		$obj->SetFont($font);   
		$obj->DrawObject($xres);

		//use a temporary file....
		$tmpName = tempnam(SIX_ROOT . '/cache', 'img');
		imagepng($obj->getImage(), $tmpName);
		// Image($file,$x,$y,$w=0,$h=0,$type='',$link='')
		$this->Image($tmpName, $x, $y, $w, $h, 'png');
		$obj->DestroyObject();
		unset($obj);
		unlink($tmpName);
	}
}
?>
