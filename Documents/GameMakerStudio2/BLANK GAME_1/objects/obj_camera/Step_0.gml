// obj_camera - Event Step

// Verifica a posição do jogador
var player_x = obj_Player.x;
var room_mid_x = room_width / 2;

// Checa se o player passou da metade da room
if (player_x >= room_mid_x) {
    // Move a câmera para a segunda metade da room
    camera_set_view_pos(view_camera[0], room_mid_x, 0);
} else {
    // Move a câmera para a primeira metade da room
    camera_set_view_pos(view_camera[0], 0, 0);
}
