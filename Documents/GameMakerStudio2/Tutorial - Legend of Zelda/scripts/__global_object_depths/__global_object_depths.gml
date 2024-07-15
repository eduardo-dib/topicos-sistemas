function __global_object_depths() {
	// Initialise the global array that allows the lookup of the depth of a given object
	// GM2.0 does not have a depth on objects so on import from 1.x a global array is created
	// NOTE: MacroExpansion is used to insert the array initialisation at import time
	gml_pragma( "global", "__global_object_depths()");

	// insert the generated arrays here
	global.__objectDepths[0] = 0; // obj_game
	global.__objectDepths[1] = 0; // obj_player
	global.__objectDepths[2] = 0; // Input
	global.__objectDepths[3] = 0; // obj_sword
	global.__objectDepths[4] = 0; // obj_solid
	global.__objectDepths[5] = 0; // obj_wall_top
	global.__objectDepths[6] = 0; // obj_projectile
	global.__objectDepths[7] = 0; // obj_oktorok
	global.__objectDepths[8] = 0; // obj_enemy_death
	global.__objectDepths[9] = 0; // obj_par_enemy


	global.__objectNames[0] = "obj_game";
	global.__objectNames[1] = "obj_player";
	global.__objectNames[2] = "Input";
	global.__objectNames[3] = "obj_sword";
	global.__objectNames[4] = "obj_solid";
	global.__objectNames[5] = "obj_wall_top";
	global.__objectNames[6] = "obj_projectile";
	global.__objectNames[7] = "obj_oktorok";
	global.__objectNames[8] = "obj_enemy_death";
	global.__objectNames[9] = "obj_par_enemy";


	// create another array that has the correct entries
	var len = array_length_1d(global.__objectDepths);
	global.__objectID2Depth = [];
	for( var i=0; i<len; ++i ) {
		var objID = asset_get_index( global.__objectNames[i] );
		if (objID >= 0) {
			global.__objectID2Depth[ objID ] = global.__objectDepths[i];
		} // end if
	} // end for


}
