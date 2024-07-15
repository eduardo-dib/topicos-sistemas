// Leitura de entrada do teclado
var w = keyboard_check(ord("W"));
var a = keyboard_check(ord("A"));
var d = keyboard_check(ord("D"));
var s = keyboard_check(ord("S"));

// Determinar direção de movimento
dir = point_direction(0, 0, d - a, s - w);
var_checarSeEstaPressionado = (d - a != 0) || (s - w != 0);

// Ajustar velocidade baseada na stamina
var velocidade_atual = velocidade;
if (stamina < stamina_threshold) {
    velocidade_atual = lerp(min_velocidade, velocidade, stamina / stamina_threshold);
}

// Calcular velocidades horizontal e vertical
vel_horizontal = lengthdir_x(velocidade_atual * var_checarSeEstaPressionado, dir);
vel_vertical = lengthdir_y(velocidade_atual * var_checarSeEstaPressionado, dir);

// Atualizar posição do personagem
x += vel_horizontal;
y += vel_vertical;

// Gerenciar stamina
if (var_checarSeEstaPressionado) {
    // Consome stamina enquanto o personagem se move
    stamina -= stamina_deplete_rate * (1 / room_speed);
    if (stamina < 0) stamina = 0; // Evitar que a stamina fique negativa
} else {
    // Recupera stamina quando o personagem está parado
    stamina += stamina_regen_rate * (1 / room_speed);
    if (stamina > stamina_max) stamina = stamina_max; // Evitar que a stamina ultrapasse o máximo
}
