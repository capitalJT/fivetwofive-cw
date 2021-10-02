<?php
/**
 * FiveTwoFive Theme Customizer
 *
 * @package FiveTwoFive_Theme
 */

if ( ! function_exists( 'fivetwofive_theme_default_theme_mods' ) ) :
	/**
	 * Default Theme mods
	 *
	 * @return array $default_theme_mods Default Theme mods.
	 */
	function fivetwofive_theme_default_theme_mods() {
		/**
		 * The default theme mods the theme will use if there is no settings applied.
		 */
		$default_theme_mods = apply_filters(
			'fivetwofive_theme_default_theme_mods',
			array(
				'site_identity_hide_blogname'          => '',
				'site_identity_hide_blogdescription'   => '',
				'colors_body_background_color'         => '#ffffff',
				'colors_body_text_color'               => '#444444',
				'colors_body_heading_color'            => '#444444',
				'colors_body_link_color'               => '#444444',
				'colors_body_link_color_hover'         => '#ffcb05',
				'colors_body_link_color_visited'       => '#444444',
				'colors_button_text_color'             => '#444444',
				'colors_button_text_color_hover'       => '#FFCB05',
				'colors_button_background_color'       => '#FFCB05',
				'colors_button_background_color_hover' => '#444444',
				'colors_button_border_color'           => '#FFCB05',
				'colors_button_border_color_hover'     => '#444444',
				'colors_header_background_color'       => '#ffffff',
				'colors_primary_navigation_background_color' => '#ffffff',
				'colors_primary_navigation_link_color' => '#444444',
				'colors_primary_navigation_active_link_color' => '#FFCB05',
				'colors_footer_background_color'       => '#ffffff',
				'colors_footer_text_color'             => '#000000',
				'typography_body_font'                 => 'DM Sans',
				'typography_body_font_variants'        => array( '400', 'italic' ),
				'typography_body_font_category'        => 'sans-serif',
				'typography_body_font_weight'          => '400',
				'typography_heading_font'              => 'Roboto',
				'typography_heading_font_variants'     => array( '700', '700italic' ),
				'typography_heading_font_category'     => 'sans-serif',
				'typography_heading_font_weight'       => '700',
			)
		);
		return $default_theme_mods;
	}
endif;

if ( ! function_exists( 'fivetwofive_theme_mods' ) ) :
	/**
	 * Default Theme mods
	 *
	 * @return array $default_theme_mods Default Theme mods.
	 */
	function fivetwofive_theme_mods() {
		$defaults   = fivetwofive_theme_default_theme_mods();
		$theme_mods = wp_parse_args(
			get_theme_mod( 'fivetwofive_theme_mods', array() ),
			$defaults
		);

		return $theme_mods;
	}
endif;

if ( ! function_exists( 'fivetwofive_theme_google_font_names' ) ) :
	/**
	 * Get the google fonts names from the developer api.
	 *
	 * @link https://developers.google.com/fonts/docs/developer_api
	 * @return array $google_font_names Google fonts names.
	 */
	function fivetwofive_theme_google_font_names() {
		$fonts = json_decode( '["ABeeZee","Abel","Abhaya Libre","Abril Fatface","Aclonica","Acme","Actor","Adamina","Advent Pro","Aguafina Script","Akaya Kanadaka","Akaya Telivigala","Akronim","Aladin","Alata","Alatsi","Aldrich","Alef","Alegreya","Alegreya SC","Alegreya Sans","Alegreya Sans SC","Aleo","Alex Brush","Alfa Slab One","Alice","Alike","Alike Angular","Allan","Allerta","Allerta Stencil","Allura","Almarai","Almendra","Almendra Display","Almendra SC","Amarante","Amaranth","Amatic SC","Amethysta","Amiko","Amiri","Amita","Anaheim","Andada","Andika","Andika New Basic","Angkor","Annie Use Your Telescope","Anonymous Pro","Antic","Antic Didone","Antic Slab","Anton","Antonio","Arapey","Arbutus","Arbutus Slab","Architects Daughter","Archivo","Archivo Black","Archivo Narrow","Aref Ruqaa","Arima Madurai","Arimo","Arizonia","Armata","Arsenal","Artifika","Arvo","Arya","Asap","Asap Condensed","Asar","Asset","Assistant","Astloch","Asul","Athiti","Atma","Atomic Age","Aubrey","Audiowide","Autour One","Average","Average Sans","Averia Gruesa Libre","Averia Libre","Averia Sans Libre","Averia Serif Libre","B612","B612 Mono","Bad Script","Bahiana","Bahianita","Bai Jamjuree","Ballet","Baloo 2","Baloo Bhai 2","Baloo Bhaina 2","Baloo Chettan 2","Baloo Da 2","Baloo Paaji 2","Baloo Tamma 2","Baloo Tammudu 2","Baloo Thambi 2","Balsamiq Sans","Balthazar","Bangers","Barlow","Barlow Condensed","Barlow Semi Condensed","Barriecito","Barrio","Basic","Baskervville","Battambang","Baumans","Bayon","Be Vietnam","Bebas Neue","Belgrano","Bellefair","Belleza","Bellota","Bellota Text","BenchNine","Benne","Bentham","Berkshire Swash","Beth Ellen","Bevan","Big Shoulders Display","Big Shoulders Inline Display","Big Shoulders Inline Text","Big Shoulders Stencil Display","Big Shoulders Stencil Text","Big Shoulders Text","Bigelow Rules","Bigshot One","Bilbo","Bilbo Swash Caps","BioRhyme","BioRhyme Expanded","Biryani","Bitter","Black And White Picture","Black Han Sans","Black Ops One","Blinker","Bodoni Moda","Bokor","Bonbon","Boogaloo","Bowlby One","Bowlby One SC","Brawler","Bree Serif","Brygada 1918","Bubblegum Sans","Bubbler One","Buda","Buenard","Bungee","Bungee Hairline","Bungee Inline","Bungee Outline","Bungee Shade","Butcherman","Butterfly Kids","Cabin","Cabin Condensed","Cabin Sketch","Caesar Dressing","Cagliostro","Cairo","Caladea","Calistoga","Calligraffitti","Cambay","Cambo","Candal","Cantarell","Cantata One","Cantora One","Capriola","Cardo","Carme","Carrois Gothic","Carrois Gothic SC","Carter One","Castoro","Catamaran","Caudex","Caveat","Caveat Brush","Cedarville Cursive","Ceviche One","Chakra Petch","Changa","Changa One","Chango","Charm","Charmonman","Chathura","Chau Philomene One","Chela One","Chelsea Market","Chenla","Cherry Cream Soda","Cherry Swash","Chewy","Chicle","Chilanka","Chivo","Chonburi","Cinzel","Cinzel Decorative","Clicker Script","Coda","Coda Caption","Codystar","Coiny","Combo","Comfortaa","Comic Neue","Coming Soon","Commissioner","Concert One","Condiment","Content","Contrail One","Convergence","Cookie","Copse","Corben","Cormorant","Cormorant Garamond","Cormorant Infant","Cormorant SC","Cormorant Unicase","Cormorant Upright","Courgette","Courier Prime","Cousine","Coustard","Covered By Your Grace","Crafty Girls","Creepster","Crete Round","Crimson Pro","Crimson Text","Croissant One","Crushed","Cuprum","Cute Font","Cutive","Cutive Mono","DM Mono","DM Sans","DM Serif Display","DM Serif Text","Damion","Dancing Script","Dangrek","Darker Grotesque","David Libre","Dawning of a New Day","Days One","Dekko","Dela Gothic One","Delius","Delius Swash Caps","Delius Unicase","Della Respira","Denk One","Devonshire","Dhurjati","Didact Gothic","Diplomata","Diplomata SC","Do Hyeon","Dokdo","Domine","Donegal One","Doppio One","Dorsa","Dosis","DotGothic16","Dr Sugiyama","Duru Sans","Dynalight","EB Garamond","Eagle Lake","East Sea Dokdo","Eater","Economica","Eczar","El Messiri","Electrolize","Elsie","Elsie Swash Caps","Emblema One","Emilys Candy","Encode Sans","Encode Sans Condensed","Encode Sans Expanded","Encode Sans Semi Condensed","Encode Sans Semi Expanded","Engagement","Englebert","Enriqueta","Epilogue","Erica One","Esteban","Euphoria Script","Ewert","Exo","Exo 2","Expletus Sans","Fahkwang","Fanwood Text","Farro","Farsan","Fascinate","Fascinate Inline","Faster One","Fasthand","Fauna One","Faustina","Federant","Federo","Felipa","Fenix","Finger Paint","Fira Code","Fira Mono","Fira Sans","Fira Sans Condensed","Fira Sans Extra Condensed","Fjalla One","Fjord One","Flamenco","Flavors","Fondamento","Fontdiner Swanky","Forum","Francois One","Frank Ruhl Libre","Fraunces","Freckle Face","Fredericka the Great","Fredoka One","Freehand","Fresca","Frijole","Fruktur","Fugaz One","GFS Didot","GFS Neohellenic","Gabriela","Gaegu","Gafata","Galada","Galdeano","Galindo","Gamja Flower","Gayathri","Gelasio","Gentium Basic","Gentium Book Basic","Geo","Geostar","Geostar Fill","Germania One","Gidugu","Gilda Display","Girassol","Give You Glory","Glass Antiqua","Glegoo","Gloria Hallelujah","Goblin One","Gochi Hand","Goldman","Gorditas","Gothic A1","Gotu","Goudy Bookletter 1911","Graduate","Grand Hotel","Grandstander","Gravitas One","Great Vibes","Grenze","Grenze Gotisch","Griffy","Gruppo","Gudea","Gugi","Gupter","Gurajada","Habibi","Hachi Maru Pop","Halant","Hammersmith One","Hanalei","Hanalei Fill","Handlee","Hanuman","Happy Monkey","Harmattan","Headland One","Heebo","Henny Penny","Hepta Slab","Herr Von Muellerhoff","Hi Melody","Hind","Hind Guntur","Hind Madurai","Hind Siliguri","Hind Vadodara","Holtwood One SC","Homemade Apple","Homenaje","IBM Plex Mono","IBM Plex Sans","IBM Plex Sans Condensed","IBM Plex Serif","IM Fell DW Pica","IM Fell DW Pica SC","IM Fell Double Pica","IM Fell Double Pica SC","IM Fell English","IM Fell English SC","IM Fell French Canon","IM Fell French Canon SC","IM Fell Great Primer","IM Fell Great Primer SC","Ibarra Real Nova","Iceberg","Iceland","Imbue","Imprima","Inconsolata","Inder","Indie Flower","Inika","Inknut Antiqua","Inria Sans","Inria Serif","Inter","Irish Grover","Istok Web","Italiana","Italianno","Itim","Jacques Francois","Jacques Francois Shadow","Jaldi","JetBrains Mono","Jim Nightshade","Jockey One","Jolly Lodger","Jomhuria","Jomolhari","Josefin Sans","Josefin Slab","Jost","Joti One","Jua","Judson","Julee","Julius Sans One","Junge","Jura","Just Another Hand","Just Me Again Down Here","K2D","Kadwa","Kalam","Kameron","Kanit","Kantumruy","Karantina","Karla","Karma","Katibeh","Kaushan Script","Kavivanar","Kavoon","Kdam Thmor","Keania One","Kelly Slab","Kenia","Khand","Khmer","Khula","Kirang Haerang","Kite One","Kiwi Maru","Knewave","KoHo","Kodchasan","Kosugi","Kosugi Maru","Kotta One","Koulen","Kranky","Kreon","Kristi","Krona One","Krub","Kufam","Kulim Park","Kumar One","Kumar One Outline","Kumbh Sans","Kurale","La Belle Aurore","Lacquer","Laila","Lakki Reddy","Lalezar","Lancelot","Langar","Lateef","Lato","League Script","Leckerli One","Ledger","Lekton","Lemon","Lemonada","Lexend","Lexend Deca","Lexend Exa","Lexend Giga","Lexend Mega","Lexend Peta","Lexend Tera","Lexend Zetta","Libre Barcode 128","Libre Barcode 128 Text","Libre Barcode 39","Libre Barcode 39 Extended","Libre Barcode 39 Extended Text","Libre Barcode 39 Text","Libre Barcode EAN13 Text","Libre Baskerville","Libre Caslon Display","Libre Caslon Text","Libre Franklin","Life Savers","Lilita One","Lily Script One","Limelight","Linden Hill","Literata","Liu Jian Mao Cao","Livvic","Lobster","Lobster Two","Londrina Outline","Londrina Shadow","Londrina Sketch","Londrina Solid","Long Cang","Lora","Love Ya Like A Sister","Loved by the King","Lovers Quarrel","Luckiest Guy","Lusitana","Lustria","M PLUS 1p","M PLUS Rounded 1c","Ma Shan Zheng","Macondo","Macondo Swash Caps","Mada","Magra","Maiden Orange","Maitree","Major Mono Display","Mako","Mali","Mallanna","Mandali","Manjari","Manrope","Mansalva","Manuale","Marcellus","Marcellus SC","Marck Script","Margarine","Markazi Text","Marko One","Marmelad","Martel","Martel Sans","Marvel","Mate","Mate SC","Maven Pro","McLaren","Meddon","MedievalSharp","Medula One","Meera Inimai","Megrim","Meie Script","Merienda","Merienda One","Merriweather","Merriweather Sans","Metal","Metal Mania","Metamorphous","Metrophobic","Michroma","Milonga","Miltonian","Miltonian Tattoo","Mina","Miniver","Miriam Libre","Mirza","Miss Fajardose","Mitr","Modak","Modern Antiqua","Mogra","Molengo","Molle","Monda","Monofett","Monoton","Monsieur La Doulaise","Montaga","Montez","Montserrat","Montserrat Alternates","Montserrat Subrayada","Moul","Moulpali","Mountains of Christmas","Mouse Memoirs","Mr Bedfort","Mr Dafoe","Mr De Haviland","Mrs Saint Delafield","Mrs Sheppards","Mukta","Mukta Mahee","Mukta Malar","Mukta Vaani","Mulish","MuseoModerno","Mystery Quest","NTR","Nanum Brush Script","Nanum Gothic","Nanum Gothic Coding","Nanum Myeongjo","Nanum Pen Script","Nerko One","Neucha","Neuton","New Rocker","New Tegomin","News Cycle","Newsreader","Niconne","Niramit","Nixie One","Nobile","Nokora","Norican","Nosifer","Notable","Nothing You Could Do","Noticia Text","Noto Sans","Noto Sans HK","Noto Sans JP","Noto Sans KR","Noto Sans SC","Noto Sans TC","Noto Serif","Noto Serif JP","Noto Serif KR","Noto Serif SC","Noto Serif TC","Nova Cut","Nova Flat","Nova Mono","Nova Oval","Nova Round","Nova Script","Nova Slim","Nova Square","Numans","Nunito","Nunito Sans","Odibee Sans","Odor Mean Chey","Offside","Oi","Old Standard TT","Oldenburg","Oleo Script","Oleo Script Swash Caps","Open Sans","Open Sans Condensed","Oranienbaum","Orbitron","Oregano","Orelega One","Orienta","Original Surfer","Oswald","Over the Rainbow","Overlock","Overlock SC","Overpass","Overpass Mono","Ovo","Oxanium","Oxygen","Oxygen Mono","PT Mono","PT Sans","PT Sans Caption","PT Sans Narrow","PT Serif","PT Serif Caption","Pacifico","Padauk","Palanquin","Palanquin Dark","Pangolin","Paprika","Parisienne","Passero One","Passion One","Pathway Gothic One","Patrick Hand","Patrick Hand SC","Pattaya","Patua One","Pavanam","Paytone One","Peddana","Peralta","Permanent Marker","Petit Formal Script","Petrona","Philosopher","Piazzolla","Piedra","Pinyon Script","Pirata One","Plaster","Play","Playball","Playfair Display","Playfair Display SC","Podkova","Poiret One","Poller One","Poly","Pompiere","Pontano Sans","Poor Story","Poppins","Port Lligat Sans","Port Lligat Slab","Potta One","Pragati Narrow","Prata","Preahvihear","Press Start 2P","Pridi","Princess Sofia","Prociono","Prompt","Prosto One","Proza Libre","Public Sans","Puritan","Purple Purse","Quando","Quantico","Quattrocento","Quattrocento Sans","Questrial","Quicksand","Quintessential","Qwigley","Racing Sans One","Radley","Rajdhani","Rakkas","Raleway","Raleway Dots","Ramabhadra","Ramaraja","Rambla","Rammetto One","Ranchers","Rancho","Ranga","Rasa","Rationale","Ravi Prakash","Recursive","Red Hat Display","Red Hat Text","Red Rose","Redressed","Reem Kufi","Reenie Beanie","Reggae One","Revalia","Rhodium Libre","Ribeye","Ribeye Marrow","Righteous","Risque","Roboto","Roboto Condensed","Roboto Mono","Roboto Slab","Rochester","Rock Salt","RocknRoll One","Rokkitt","Romanesco","Ropa Sans","Rosario","Rosarivo","Rouge Script","Rowdies","Rozha One","Rubik","Rubik Mono One","Ruda","Rufina","Ruge Boogie","Ruluko","Rum Raisin","Ruslan Display","Russo One","Ruthie","Rye","Sacramento","Sahitya","Sail","Saira","Saira Condensed","Saira Extra Condensed","Saira Semi Condensed","Saira Stencil One","Salsa","Sanchez","Sancreek","Sansita","Sansita Swashed","Sarabun","Sarala","Sarina","Sarpanch","Satisfy","Sawarabi Gothic","Sawarabi Mincho","Scada","Scheherazade","Schoolbell","Scope One","Seaweed Script","Secular One","Sedgwick Ave","Sedgwick Ave Display","Sen","Sevillana","Seymour One","Shadows Into Light","Shadows Into Light Two","Shanti","Share","Share Tech","Share Tech Mono","Shippori Mincho","Shippori Mincho B1","Shojumaru","Short Stack","Shrikhand","Siemreap","Sigmar One","Signika","Signika Negative","Simonetta","Single Day","Sintony","Sirin Stencil","Six Caps","Skranji","Slabo 13px","Slabo 27px","Slackey","Smokum","Smythe","Sniglet","Snippet","Snowburst One","Sofadi One","Sofia","Solway","Song Myung","Sonsie One","Sora","Sorts Mill Goudy","Source Code Pro","Source Sans Pro","Source Serif Pro","Space Grotesk","Space Mono","Spartan","Special Elite","Spectral","Spectral SC","Spicy Rice","Spinnaker","Spirax","Squada One","Sree Krushnadevaraya","Sriracha","Srisakdi","Staatliches","Stalemate","Stalinist One","Stardos Stencil","Stick","Stint Ultra Condensed","Stint Ultra Expanded","Stoke","Strait","Stylish","Sue Ellen Francisco","Suez One","Sulphur Point","Sumana","Sunflower","Sunshiney","Supermercado One","Sura","Suranna","Suravaram","Suwannaphum","Swanky and Moo Moo","Syncopate","Syne","Syne Mono","Syne Tactile","Tajawal","Tangerine","Taprom","Tauri","Taviraj","Teko","Telex","Tenali Ramakrishna","Tenor Sans","Text Me One","Texturina","Thasadith","The Girl Next Door","Tienne","Tillana","Timmana","Tinos","Titan One","Titillium Web","Tomorrow","Trade Winds","Train One","Trirong","Trispace","Trocchi","Trochut","Truculenta","Trykker","Tulpen One","Turret Road","Ubuntu","Ubuntu Condensed","Ubuntu Mono","Ultra","Uncial Antiqua","Underdog","Unica One","UnifrakturCook","UnifrakturMaguntia","Unkempt","Unlock","Unna","VT323","Vampiro One","Varela","Varela Round","Varta","Vast Shadow","Vesper Libre","Viaoda Libre","Vibes","Vibur","Vidaloka","Viga","Voces","Volkhov","Vollkorn","Vollkorn SC","Voltaire","Waiting for the Sunrise","Wallpoet","Walter Turncoat","Warnes","Wellfleet","Wendy One","Wire One","Work Sans","Xanh Mono","Yanone Kaffeesatz","Yantramanav","Yatra One","Yellowtail","Yeon Sung","Yeseva One","Yesteryear","Yrsa","Yusei Magic","ZCOOL KuaiLe","ZCOOL QingKe HuangYou","ZCOOL XiaoWei","Zen Dots","Zeyada","Zhi Mang Xing","Zilla Slab","Zilla Slab Highlight"]' );

		$google_font_names = array();

		foreach ( $fonts as $font ) {
			$google_font_names[ $font ] = $font;
		}

		return $google_font_names;
	}
endif;

if ( ! function_exists( 'fivetwofive_theme_typography_config' ) ) :
	/**
	 * Customizer typography fields dropdown options.
	 *
	 * @return array $typography_config typography dropdown options.
	 */
	function fivetwofive_theme_typography_config() {

		$typography_config = array(
			'google_fonts'    => fivetwofive_theme_google_font_names(),
			'font_variants'   => array(
				'100'       => 'Thin',
				'100italic' => 'Thin italic',
				'200'       => 'Etra-light',
				'200italic' => 'Etra-light italic',
				'300'       => 'Light',
				'300italic' => 'Light italic',
				'400'       => 'Regular',
				'400italic' => 'Regular italic',
				'500'       => 'Medium',
				'500italic' => 'Medium italic',
				'600'       => 'Semi-bold',
				'600italic' => 'Semi-bold italic',
				'700'       => 'Bold',
				'700italic' => 'Bold italic',
				'800'       => 'Extra-bold',
				'800italic' => 'Extra-bold italic',
				'900'       => 'Black',
				'900italic' => 'Black italic',
			),
			'font_weights'    => array(
				'100' => 'Thin (100)',
				'200' => 'Etra light (200)',
				'300' => 'Light (300)',
				'400' => 'Regular (400)',
				'500' => 'Medium (500)',
				'600' => 'Semi-bold (600)',
				'700' => 'Bold (700)',
				'800' => 'Extra-bold (800)',
				'900' => 'Black (900)',
			),
			'font_categories' => array(
				'serif'      => 'Serif',
				'sans-serif' => 'Sans Serif',
				'cursive'    => 'Display or Handwriting',
				'monospace'  => 'Monospace',
			),
		);

		return $typography_config;
	}
endif;

// Customizer additions.
require get_template_directory() . '/classes/class-fivetwofive-theme-customize.php';
new Fivetwofive_Theme_Customize();