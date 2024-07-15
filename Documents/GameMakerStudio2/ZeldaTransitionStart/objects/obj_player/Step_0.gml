/// @description  States
// Move the Player
if (run) {
    switch (keyboard_key) {
        case vk_left: x -= spd; break;
        case vk_right: x += spd; break;
        case vk_up: y -= spd; break;
        case vk_down: y += spd; break
        case vk_nokey: break;
    }
}

// Check if the transition is happening
if (instance_exists(sys_transition)) { run = false; }
else { run = true; }

