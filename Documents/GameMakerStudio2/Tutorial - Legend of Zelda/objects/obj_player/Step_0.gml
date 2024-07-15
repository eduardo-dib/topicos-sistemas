anim_speed = 0.2;

switch(state) {
    case "ATTACK_SWORD_START": {
        image_speed = 0;
        vx = 0;
        vy = 0;
        timer = 15;
        sprite_index = sprite_attack;
        state = "ATTACK_SWORD";
        break;
    }
    case "ATTACK_SWORD": {
        if (timer == 8) {
            switch(facing) {
                case 0: {
                    with(instance_create(x, y-12, obj_sword) ) {
                        image_angle = 0;
                    }
                    break;
                }
                case 1: {
                    with(instance_create(x+12, y, obj_sword) ) {
                        image_angle = 270;
                    }
                    break;
                }
                case 2: {
                    with(instance_create(x, y+12, obj_sword) ) {
                        image_angle = 180;
                    }
                    break;
                }
                case 3: {
                    with(instance_create(x-12, y, obj_sword) ) {
                        image_angle = 90;
                    }
                    break;
                }
            }
        }
    
        if (timer > 0) {
            timer -= 1;
        } else {
            state = "IDLE";
        }
        break;
    }
    case "IDLE": {
        image_speed = 0;
        sprite_index = sprite_walk;
        
        vx = 0;
        vy = 0;
        check_inputs_all();
        break;
    }
    case "UP": {
        facing = 0;
        image_speed = anim_speed;
        sprite_walk = spr_player_up;
        sprite_attack = spr_player_attack_up;
        sprite_index = sprite_walk;
        
        image_xscale = 1;
        vx = 0;
        vy = -1 * player_speed;
        
        check_inputs_all();
        break;
    }
    case "DOWN": {
        facing = 2;
        image_speed = anim_speed;
        sprite_walk = spr_player_down;
        sprite_attack = spr_player_attack_down;
        sprite_index = sprite_walk;
        
        image_xscale = 1;
        vx = 0;
        vy = player_speed;
        
        check_inputs_all();
        break;
    }
    case "LEFT": {
        facing = 3;
        image_speed = anim_speed;
        sprite_walk = spr_player_side;
        sprite_attack = spr_player_attack_side;
        sprite_index = sprite_walk;
        
        image_xscale = 1;
        vx = -1 * player_speed;
        vy = 0
        
        check_inputs_all();
        break;
    }
    case "RIGHT": {
        facing = 1;
        image_speed = anim_speed;
        sprite_walk = spr_player_side;
        sprite_attack = spr_player_attack_side;
        sprite_index = sprite_walk;
        
        image_xscale = -1;
        vx = player_speed;
        vy = 0;
        
        check_inputs_all();
        break;
    }
}

check_collision_obj(vx, vy, obj_solid);

