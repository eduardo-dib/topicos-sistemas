
target_xview = (obj_player.x div 256) * 256;
target_yview = (obj_player.y div 176) * 176;

__view_set( e__VW.XView, 0, move_toward(__view_get( e__VW.XView, 0 ),target_xview,4) );
__view_set( e__VW.YView, 0, move_toward(__view_get( e__VW.YView, 0 ),target_yview,4) );

