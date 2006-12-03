<?php
// $Header: /cvsroot/html2ps/encoding.iso-8859-7.inc.php,v 1.5 2006/01/24 18:27:36 Konstantin Exp $

$g_iso_8859_7 = array(
/*
                      "\x00" => code_to_utf8(0x0000),	//	NULL
"\x01" => code_to_utf8(0x0001),	//	START OF HEADING
"\x02" => code_to_utf8(0x0002),	//	START OF TEXT
"\x03" => code_to_utf8(0x0003),	//	END OF TEXT
"\x04" => code_to_utf8(0x0004),	//	END OF TRANSMISSION
"\x05" => code_to_utf8(0x0005),	//	ENQUIRY
"\x06" => code_to_utf8(0x0006),	//	ACKNOWLEDGE
"\x07" => code_to_utf8(0x0007),	//	BELL
"\x08" => code_to_utf8(0x0008),	//	BACKSPACE
"\x09" => code_to_utf8(0x0009),	//	HORIZONTAL TABULATION
"\x0A" => code_to_utf8(0x000A),	//	LINE FEED
"\x0B" => code_to_utf8(0x000B),	//	VERTICAL TABULATION
"\x0C" => code_to_utf8(0x000C),	//	FORM FEED
"\x0D" => code_to_utf8(0x000D),	//	CARRIAGE RETURN
"\x0E" => code_to_utf8(0x000E),	//	SHIFT OUT
"\x0F" => code_to_utf8(0x000F),	//	SHIFT IN
"\x10" => code_to_utf8(0x0010),	//	DATA LINK ESCAPE
"\x11" => code_to_utf8(0x0011),	//	DEVICE CONTROL ONE
"\x12" => code_to_utf8(0x0012),	//	DEVICE CONTROL TWO
"\x13" => code_to_utf8(0x0013),	//	DEVICE CONTROL THREE
"\x14" => code_to_utf8(0x0014),	//	DEVICE CONTROL FOUR
"\x15" => code_to_utf8(0x0015),	//	NEGATIVE ACKNOWLEDGE
"\x16" => code_to_utf8(0x0016),	//	SYNCHRONOUS IDLE
"\x17" => code_to_utf8(0x0017),	//	END OF TRANSMISSION BLOCK
"\x18" => code_to_utf8(0x0018),	//	CANCEL
"\x19" => code_to_utf8(0x0019),	//	END OF MEDIUM
"\x1A" => code_to_utf8(0x001A),	//	SUBSTITUTE
"\x1B" => code_to_utf8(0x001B),	//	ESCAPE
"\x1C" => code_to_utf8(0x001C),	//	FILE SEPARATOR
"\x1D" => code_to_utf8(0x001D),	//	GROUP SEPARATOR
"\x1E" => code_to_utf8(0x001E),	//	RECORD SEPARATOR
"\x1F" => code_to_utf8(0x001F),	//	UNIT SEPARATOR
"\x20" => code_to_utf8(0x0020),	//	SPACE
"\x21" => code_to_utf8(0x0021),	//	EXCLAMATION MARK
"\x22" => code_to_utf8(0x0022),	//	QUOTATION MARK
"\x23" => code_to_utf8(0x0023),	//	NUMBER SIGN
"\x24" => code_to_utf8(0x0024),	//	DOLLAR SIGN
"\x25" => code_to_utf8(0x0025),	//	PERCENT SIGN
"\x26" => code_to_utf8(0x0026),	//	AMPERSAND
"\x27" => code_to_utf8(0x0027),	//	APOSTROPHE
"\x28" => code_to_utf8(0x0028),	//	LEFT PARENTHESIS
"\x29" => code_to_utf8(0x0029),	//	RIGHT PARENTHESIS
"\x2A" => code_to_utf8(0x002A),	//	ASTERISK
"\x2B" => code_to_utf8(0x002B),	//	PLUS SIGN
"\x2C" => code_to_utf8(0x002C),	//	COMMA
"\x2D" => code_to_utf8(0x002D),	//	HYPHEN-MINUS
"\x2E" => code_to_utf8(0x002E),	//	FULL STOP
"\x2F" => code_to_utf8(0x002F),	//	SOLIDUS
"\x30" => code_to_utf8(0x0030),	//	DIGIT ZERO
"\x31" => code_to_utf8(0x0031),	//	DIGIT ONE
"\x32" => code_to_utf8(0x0032),	//	DIGIT TWO
"\x33" => code_to_utf8(0x0033),	//	DIGIT THREE
"\x34" => code_to_utf8(0x0034),	//	DIGIT FOUR
"\x35" => code_to_utf8(0x0035),	//	DIGIT FIVE
"\x36" => code_to_utf8(0x0036),	//	DIGIT SIX
"\x37" => code_to_utf8(0x0037),	//	DIGIT SEVEN
"\x38" => code_to_utf8(0x0038),	//	DIGIT EIGHT
"\x39" => code_to_utf8(0x0039),	//	DIGIT NINE
"\x3A" => code_to_utf8(0x003A),	//	COLON
"\x3B" => code_to_utf8(0x003B),	//	SEMICOLON
"\x3C" => code_to_utf8(0x003C),	//	LESS-THAN SIGN
"\x3D" => code_to_utf8(0x003D),	//	EQUALS SIGN
"\x3E" => code_to_utf8(0x003E),	//	GREATER-THAN SIGN
"\x3F" => code_to_utf8(0x003F),	//	QUESTION MARK
"\x40" => code_to_utf8(0x0040),	//	COMMERCIAL AT
"\x41" => code_to_utf8(0x0041),	//	LATIN CAPITAL LETTER A
"\x42" => code_to_utf8(0x0042),	//	LATIN CAPITAL LETTER B
"\x43" => code_to_utf8(0x0043),	//	LATIN CAPITAL LETTER C
"\x44" => code_to_utf8(0x0044),	//	LATIN CAPITAL LETTER D
"\x45" => code_to_utf8(0x0045),	//	LATIN CAPITAL LETTER E
"\x46" => code_to_utf8(0x0046),	//	LATIN CAPITAL LETTER F
"\x47" => code_to_utf8(0x0047),	//	LATIN CAPITAL LETTER G
"\x48" => code_to_utf8(0x0048),	//	LATIN CAPITAL LETTER H
"\x49" => code_to_utf8(0x0049),	//	LATIN CAPITAL LETTER I
"\x4A" => code_to_utf8(0x004A),	//	LATIN CAPITAL LETTER J
"\x4B" => code_to_utf8(0x004B),	//	LATIN CAPITAL LETTER K
"\x4C" => code_to_utf8(0x004C),	//	LATIN CAPITAL LETTER L
"\x4D" => code_to_utf8(0x004D),	//	LATIN CAPITAL LETTER M
"\x4E" => code_to_utf8(0x004E),	//	LATIN CAPITAL LETTER N
"\x4F" => code_to_utf8(0x004F),	//	LATIN CAPITAL LETTER O
"\x50" => code_to_utf8(0x0050),	//	LATIN CAPITAL LETTER P
"\x51" => code_to_utf8(0x0051),	//	LATIN CAPITAL LETTER Q
"\x52" => code_to_utf8(0x0052),	//	LATIN CAPITAL LETTER R
"\x53" => code_to_utf8(0x0053),	//	LATIN CAPITAL LETTER S
"\x54" => code_to_utf8(0x0054),	//	LATIN CAPITAL LETTER T
"\x55" => code_to_utf8(0x0055),	//	LATIN CAPITAL LETTER U
"\x56" => code_to_utf8(0x0056),	//	LATIN CAPITAL LETTER V
"\x57" => code_to_utf8(0x0057),	//	LATIN CAPITAL LETTER W
"\x58" => code_to_utf8(0x0058),	//	LATIN CAPITAL LETTER X
"\x59" => code_to_utf8(0x0059),	//	LATIN CAPITAL LETTER Y
"\x5A" => code_to_utf8(0x005A),	//	LATIN CAPITAL LETTER Z
"\x5B" => code_to_utf8(0x005B),	//	LEFT SQUARE BRACKET
"\x5C" => code_to_utf8(0x005C),	//	REVERSE SOLIDUS
"\x5D" => code_to_utf8(0x005D),	//	RIGHT SQUARE BRACKET
"\x5E" => code_to_utf8(0x005E),	//	CIRCUMFLEX ACCENT
"\x5F" => code_to_utf8(0x005F),	//	LOW LINE
"\x60" => code_to_utf8(0x0060),	//	GRAVE ACCENT
"\x61" => code_to_utf8(0x0061),	//	LATIN SMALL LETTER A
"\x62" => code_to_utf8(0x0062),	//	LATIN SMALL LETTER B
"\x63" => code_to_utf8(0x0063),	//	LATIN SMALL LETTER C
"\x64" => code_to_utf8(0x0064),	//	LATIN SMALL LETTER D
"\x65" => code_to_utf8(0x0065),	//	LATIN SMALL LETTER E
"\x66" => code_to_utf8(0x0066),	//	LATIN SMALL LETTER F
"\x67" => code_to_utf8(0x0067),	//	LATIN SMALL LETTER G
"\x68" => code_to_utf8(0x0068),	//	LATIN SMALL LETTER H
"\x69" => code_to_utf8(0x0069),	//	LATIN SMALL LETTER I
"\x6A" => code_to_utf8(0x006A),	//	LATIN SMALL LETTER J
"\x6B" => code_to_utf8(0x006B),	//	LATIN SMALL LETTER K
"\x6C" => code_to_utf8(0x006C),	//	LATIN SMALL LETTER L
"\x6D" => code_to_utf8(0x006D),	//	LATIN SMALL LETTER M
"\x6E" => code_to_utf8(0x006E),	//	LATIN SMALL LETTER N
"\x6F" => code_to_utf8(0x006F),	//	LATIN SMALL LETTER O
"\x70" => code_to_utf8(0x0070),	//	LATIN SMALL LETTER P
"\x71" => code_to_utf8(0x0071),	//	LATIN SMALL LETTER Q
"\x72" => code_to_utf8(0x0072),	//	LATIN SMALL LETTER R
"\x73" => code_to_utf8(0x0073),	//	LATIN SMALL LETTER S
"\x74" => code_to_utf8(0x0074),	//	LATIN SMALL LETTER T
"\x75" => code_to_utf8(0x0075),	//	LATIN SMALL LETTER U
"\x76" => code_to_utf8(0x0076),	//	LATIN SMALL LETTER V
"\x77" => code_to_utf8(0x0077),	//	LATIN SMALL LETTER W
"\x78" => code_to_utf8(0x0078),	//	LATIN SMALL LETTER X
"\x79" => code_to_utf8(0x0079),	//	LATIN SMALL LETTER Y
"\x7A" => code_to_utf8(0x007A),	//	LATIN SMALL LETTER Z
"\x7B" => code_to_utf8(0x007B),	//	LEFT CURLY BRACKET
"\x7C" => code_to_utf8(0x007C),	//	VERTICAL LINE
"\x7D" => code_to_utf8(0x007D),	//	RIGHT CURLY BRACKET
"\x7E" => code_to_utf8(0x007E),	//	TILDE
"\x7F" => code_to_utf8(0x007F),	//	DELETE
"\x80" => code_to_utf8(0x0080),	//	<control>
"\x81" => code_to_utf8(0x0081),	//	<control>
"\x82" => code_to_utf8(0x0082),	//	<control>
"\x83" => code_to_utf8(0x0083),	//	<control>
"\x84" => code_to_utf8(0x0084),	//	<control>
"\x85" => code_to_utf8(0x0085),	//	<control>
"\x86" => code_to_utf8(0x0086),	//	<control>
"\x87" => code_to_utf8(0x0087),	//	<control>
"\x88" => code_to_utf8(0x0088),	//	<control>
"\x89" => code_to_utf8(0x0089),	//	<control>
"\x8A" => code_to_utf8(0x008A),	//	<control>
"\x8B" => code_to_utf8(0x008B),	//	<control>
"\x8C" => code_to_utf8(0x008C),	//	<control>
"\x8D" => code_to_utf8(0x008D),	//	<control>
"\x8E" => code_to_utf8(0x008E),	//	<control>
"\x8F" => code_to_utf8(0x008F),	//	<control>
"\x90" => code_to_utf8(0x0090),	//	<control>
"\x91" => code_to_utf8(0x0091),	//	<control>
"\x92" => code_to_utf8(0x0092),	//	<control>
"\x93" => code_to_utf8(0x0093),	//	<control>
"\x94" => code_to_utf8(0x0094),	//	<control>
"\x95" => code_to_utf8(0x0095),	//	<control>
"\x96" => code_to_utf8(0x0096),	//	<control>
"\x97" => code_to_utf8(0x0097),	//	<control>
"\x98" => code_to_utf8(0x0098),	//	<control>
"\x99" => code_to_utf8(0x0099),	//	<control>
"\x9A" => code_to_utf8(0x009A),	//	<control>
"\x9B" => code_to_utf8(0x009B),	//	<control>
"\x9C" => code_to_utf8(0x009C),	//	<control>
"\x9D" => code_to_utf8(0x009D),	//	<control>
"\x9E" => code_to_utf8(0x009E),	//	<control>
"\x9F" => code_to_utf8(0x009F),	//	<control>
"\xA0" => code_to_utf8(0x00A0),	//	NO-BREAK SPACE
"\xA1" => code_to_utf8(0x2018),	//	LEFT SINGLE QUOTATION MARK
"\xA2" => code_to_utf8(0x2019),	//	RIGHT SINGLE QUOTATION MARK
"\xA3" => code_to_utf8(0x00A3),	//	POUND SIGN
                      // "\xA4" => code_to_utf8(0x20AC),	//	EURO SIGN (missing in PDFLIB codepages)
"\xA5" => code_to_utf8(0x20AF),	//	DRACHMA SIGN
"\xA6" => code_to_utf8(0x00A6),	//	BROKEN BAR
"\xA7" => code_to_utf8(0x00A7),	//	SECTION SIGN
"\xA8" => code_to_utf8(0x00A8),	//	DIAERESIS
"\xA9" => code_to_utf8(0x00A9),	//	COPYRIGHT SIGN
"\xAA" => code_to_utf8(0x037A),	//	GREEK YPOGEGRAMMENI
"\xAB" => code_to_utf8(0x00AB),	//	LEFT-POINTING DOUBLE ANGLE QUOTATION MARK
"\xAC" => code_to_utf8(0x00AC),	//	NOT SIGN
"\xAD" => code_to_utf8(0x00AD),	//	SOFT HYPHEN
"\xAF" => code_to_utf8(0x2015),	//	HORIZONTAL BAR
"\xB0" => code_to_utf8(0x00B0),	//	DEGREE SIGN
"\xB1" => code_to_utf8(0x00B1),	//	PLUS-MINUS SIGN
"\xB2" => code_to_utf8(0x00B2),	//	SUPERSCRIPT TWO
"\xB3" => code_to_utf8(0x00B3),	//	SUPERSCRIPT THREE
*/
"\xB4" => code_to_utf8(0x0384),	//	GREEK TONOS
"\xB5" => code_to_utf8(0x0385),	//	GREEK DIALYTIKA TONOS
"\xB6" => code_to_utf8(0x0386),	//	GREEK CAPITAL LETTER ALPHA WITH TONOS
"\xB7" => code_to_utf8(0x00B7),	//	MIDDLE DOT
"\xB8" => code_to_utf8(0x0388),	//	GREEK CAPITAL LETTER EPSILON WITH TONOS
"\xB9" => code_to_utf8(0x0389),	//	GREEK CAPITAL LETTER ETA WITH TONOS
"\xBA" => code_to_utf8(0x038A),	//	GREEK CAPITAL LETTER IOTA WITH TONOS
"\xBB" => code_to_utf8(0x00BB),	//	RIGHT-POINTING DOUBLE ANGLE QUOTATION MARK
"\xBC" => code_to_utf8(0x038C),	//	GREEK CAPITAL LETTER OMICRON WITH TONOS
"\xBD" => code_to_utf8(0x00BD),	//	VULGAR FRACTION ONE HALF
"\xBE" => code_to_utf8(0x038E),	//	GREEK CAPITAL LETTER UPSILON WITH TONOS
"\xBF" => code_to_utf8(0x038F),	//	GREEK CAPITAL LETTER OMEGA WITH TONOS
"\xC0" => code_to_utf8(0x0390),	//	GREEK SMALL LETTER IOTA WITH DIALYTIKA AND TONOS
"\xC1" => code_to_utf8(0x0391),	//	GREEK CAPITAL LETTER ALPHA
"\xC2" => code_to_utf8(0x0392),	//	GREEK CAPITAL LETTER BETA
"\xC3" => code_to_utf8(0x0393),	//	GREEK CAPITAL LETTER GAMMA
"\xC4" => code_to_utf8(0x0394),	//	GREEK CAPITAL LETTER DELTA
"\xC5" => code_to_utf8(0x0395),	//	GREEK CAPITAL LETTER EPSILON
"\xC6" => code_to_utf8(0x0396),	//	GREEK CAPITAL LETTER ZETA
"\xC7" => code_to_utf8(0x0397),	//	GREEK CAPITAL LETTER ETA
"\xC8" => code_to_utf8(0x0398),	//	GREEK CAPITAL LETTER THETA
"\xC9" => code_to_utf8(0x0399),	//	GREEK CAPITAL LETTER IOTA
"\xCA" => code_to_utf8(0x039A),	//	GREEK CAPITAL LETTER KAPPA
"\xCB" => code_to_utf8(0x039B),	//	GREEK CAPITAL LETTER LAMDA
"\xCC" => code_to_utf8(0x039C),	//	GREEK CAPITAL LETTER MU
"\xCD" => code_to_utf8(0x039D),	//	GREEK CAPITAL LETTER NU
"\xCE" => code_to_utf8(0x039E),	//	GREEK CAPITAL LETTER XI
"\xCF" => code_to_utf8(0x039F),	//	GREEK CAPITAL LETTER OMICRON
"\xD0" => code_to_utf8(0x03A0),	//	GREEK CAPITAL LETTER PI
"\xD1" => code_to_utf8(0x03A1),	//	GREEK CAPITAL LETTER RHO
"\xD3" => code_to_utf8(0x03A3),	//	GREEK CAPITAL LETTER SIGMA
"\xD4" => code_to_utf8(0x03A4),	//	GREEK CAPITAL LETTER TAU
"\xD5" => code_to_utf8(0x03A5),	//	GREEK CAPITAL LETTER UPSILON
"\xD6" => code_to_utf8(0x03A6),	//	GREEK CAPITAL LETTER PHI
"\xD7" => code_to_utf8(0x03A7),	//	GREEK CAPITAL LETTER CHI
"\xD8" => code_to_utf8(0x03A8),	//	GREEK CAPITAL LETTER PSI
"\xD9" => code_to_utf8(0x03A9),	//	GREEK CAPITAL LETTER OMEGA
"\xDA" => code_to_utf8(0x03AA),	//	GREEK CAPITAL LETTER IOTA WITH DIALYTIKA
"\xDB" => code_to_utf8(0x03AB),	//	GREEK CAPITAL LETTER UPSILON WITH DIALYTIKA
"\xDC" => code_to_utf8(0x03AC),	//	GREEK SMALL LETTER ALPHA WITH TONOS
"\xDD" => code_to_utf8(0x03AD),	//	GREEK SMALL LETTER EPSILON WITH TONOS
"\xDE" => code_to_utf8(0x03AE),	//	GREEK SMALL LETTER ETA WITH TONOS
"\xDF" => code_to_utf8(0x03AF),	//	GREEK SMALL LETTER IOTA WITH TONOS
"\xE0" => code_to_utf8(0x03B0),	//	GREEK SMALL LETTER UPSILON WITH DIALYTIKA AND TONOS
"\xE1" => code_to_utf8(0x03B1),	//	GREEK SMALL LETTER ALPHA
"\xE2" => code_to_utf8(0x03B2),	//	GREEK SMALL LETTER BETA
"\xE3" => code_to_utf8(0x03B3),	//	GREEK SMALL LETTER GAMMA
"\xE4" => code_to_utf8(0x03B4),	//	GREEK SMALL LETTER DELTA
"\xE5" => code_to_utf8(0x03B5),	//	GREEK SMALL LETTER EPSILON
"\xE6" => code_to_utf8(0x03B6),	//	GREEK SMALL LETTER ZETA
"\xE7" => code_to_utf8(0x03B7),	//	GREEK SMALL LETTER ETA
"\xE8" => code_to_utf8(0x03B8),	//	GREEK SMALL LETTER THETA
"\xE9" => code_to_utf8(0x03B9),	//	GREEK SMALL LETTER IOTA
"\xEA" => code_to_utf8(0x03BA),	//	GREEK SMALL LETTER KAPPA
"\xEB" => code_to_utf8(0x03BB),	//	GREEK SMALL LETTER LAMDA
"\xEC" => code_to_utf8(0x03BC),	//	GREEK SMALL LETTER MU
"\xED" => code_to_utf8(0x03BD),	//	GREEK SMALL LETTER NU
"\xEE" => code_to_utf8(0x03BE),	//	GREEK SMALL LETTER XI
"\xEF" => code_to_utf8(0x03BF),	//	GREEK SMALL LETTER OMICRON
"\xF0" => code_to_utf8(0x03C0),	//	GREEK SMALL LETTER PI
"\xF1" => code_to_utf8(0x03C1),	//	GREEK SMALL LETTER RHO
"\xF2" => code_to_utf8(0x03C2),	//	GREEK SMALL LETTER FINAL SIGMA
"\xF3" => code_to_utf8(0x03C3),	//	GREEK SMALL LETTER SIGMA
"\xF4" => code_to_utf8(0x03C4),	//	GREEK SMALL LETTER TAU
"\xF5" => code_to_utf8(0x03C5),	//	GREEK SMALL LETTER UPSILON
"\xF6" => code_to_utf8(0x03C6),	//	GREEK SMALL LETTER PHI
"\xF7" => code_to_utf8(0x03C7),	//	GREEK SMALL LETTER CHI
"\xF8" => code_to_utf8(0x03C8),	//	GREEK SMALL LETTER PSI
"\xF9" => code_to_utf8(0x03C9),	//	GREEK SMALL LETTER OMEGA
"\xFA" => code_to_utf8(0x03CA),	//	GREEK SMALL LETTER IOTA WITH DIALYTIKA
"\xFB" => code_to_utf8(0x03CB),	//	GREEK SMALL LETTER UPSILON WITH DIALYTIKA
"\xFC" => code_to_utf8(0x03CC),	//	GREEK SMALL LETTER OMICRON WITH TONOS
"\xFD" => code_to_utf8(0x03CD),	//	GREEK SMALL LETTER UPSILON WITH TONOS
"\xFE" => code_to_utf8(0x03CE)	//	GREEK SMALL LETTER OMEGA WITH TONOS
);
?>