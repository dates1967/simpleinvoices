<?php
/*
$res =& $mdb2->query('SELECT * FROM mytable');
if (PEAR::isError($res)) {
    die($res->getMessage());
}
while (($row = $res->fetchRow())) {
    echo $row['id'] . "\n";
}
$res->free();
*/

/*
array(
	'fields' => array(
		'user_name' => array(),
		'last_login' => array()
	)
)



*/

/*
CREACION DE TABLAS:

# opciones especificas para el RDBMS (mysql,etc):
$table_options = array(
    'comment' => 'Repository of people',
    'character_set' => 'utf8',
    'collate' => 'utf8_unicode_ci',
    'type'    => 'innodb',
);
# definicion generica:
$definition = array (
    'id' => array (
        'type' => 'integer',
        'unsigned' => 1,
        'notnull' => 1,
        'default' => 0,
    ),
    'name' => array (
        'type' => 'text',
        'length' => 255
    )
);
$mdb2->createTable('people', $definition, $table_options);

AGREGAR CONSTRAINTS:

# Primary Key:
$definition = array (
    'primary' => true,
    'fields' => array (
        'id' => array()
    )
);
$mdb2->createConstraint('table_name', 'constraint_name', $definition);

# Unique Index:
# creando un Unique Index de dos columnas,
$definition = array (
    'unique' => true,
    'fields' => array (
        'event_id' => array(),
        'person_id' => array(),
    )
);
$mdb2->createConstraint('table_name', 'constraint_name', $definition);

# Foreign Keys:
$definition = array(
	'foreign' 	=> true,
	'fields'	=> array(
		'foreignCol'	=> array()
	),
	'references' => array(
		'table' => 'referenced_table_name',
		'fields' => array(
			'referenced_field' => position
		),
		'on_update' => 'CASCADE',
		'on_delete' => 'RESTRICT'
	)
);
$mdb2->createConstraint('table_name', 'constraint_name', $definition);

# En general:

$definition = array (
	[primary] => true|false
	[unique] => true|false
	[foreign] => true|false
	[check] => true|false
	[fields] => array (
		[field1name] => array() // one entry per each field covered by the constraint
		[field2name] => array()
		[field3name] => array( 	[sorting] => ascending|descending )
	)
	[references] => array(
		[table] => name
		[fields] => array(
					[field1name] => position //one entry for each referenced field
					[field2name] => position
					[field3name] => position
					)
		[deferrable] => true|false
		[initially_deferred] => true|false
		[on_update] => CASCADE|RESTRICT|SET NULL|SET DEFAULT|NO ACTION
		[on_delete] => CASCADE|RESTRICT|SET NULL|SET DEFAULT|NO ACTION
		[match] => SIMPLE|PARTIAL|FULL
	)
);
*/



$table = 'genlu_invoices';
$res =& $mdb2->query("SELECT * FROM $table");
if (PEAR::isError($res)) {
    die($res->getMessage());
}
#$mdb2->setFetchMode(MDB2_FETCHMODE_ORDERED);
while (($row = $res->fetchRow())) {
	foreach($row as $key => $val){
		#echo "$key --> $val<br>";
	}
}
$res->free();

?>
