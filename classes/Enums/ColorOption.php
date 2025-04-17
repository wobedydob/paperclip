<?php

namespace Paperclip\Enums;

enum ColorOption: string
{
    # Colors
    case BLACK = 'black';
    case BLUE = 'blue';
    case CYAN = 'cyan';
    case DARK_GRAY = 'dark_gray';
    case GRAY = 'gray';
    case GREEN = 'green';
    case LIGHT_BLUE = 'light_blue';
    case LIGHT_CYAN = 'light_cyan';
    case LIGHT_GRAY = 'light_gray';
    case LIGHT_GREEN = 'light_green';
    case LIGHT_MAGENTA = 'light_magenta';
    case LIGHT_RED = 'light_red';
    case LIGHT_YELLOW = 'light_yellow';
    case MAGENTA = 'magenta';
    case RED = 'red';
    case WHITE = 'white';
    case YELLOW = 'yellow';

    # Background
    case BG_BLACK = 'bg_black';
    case BG_BLUE = 'bg_blue';
    case BG_CYAN = 'bg_cyan';
    case BG_DARK_GRAY = 'bg_dark_gray';
    case BG_GRAY = 'bg_gray';
    case BG_GREEN = 'bg_green';
    case BG_LIGHT_BLUE = 'bg_light_blue';
    case BG_LIGHT_CYAN = 'bg_light_cyan';
    case BG_LIGHT_GRAY = 'bg_light_gray';
    case BG_LIGHT_GREEN = 'bg_light_green';
    case BG_LIGHT_MAGENTA = 'bg_light_magenta';
    case BG_LIGHT_RED = 'bg_light_red';
    case BG_LIGHT_YELLOW = 'bg_light_yellow';
    case BG_MAGENTA = 'bg_magenta';
    case BG_RED = 'bg_red';
    case BG_WHITE = 'bg_white';
    case BG_YELLOW = 'bg_yellow';

    # Text Formatting
    case BOLD = 'bold';
    case DIM = 'dim';
    case ITALIC = 'italic';
    case UNDERLINE = 'underline';
    case BLINK = 'blink';
    case INVERSE = 'inverse';
    case HIDDEN = 'hidden';
    case STRIKETHROUGH = 'strikethrough';

    # Reset Options
    case RESET = 'reset';
    case RESET_BOLD = 'reset_bold';
    case RESET_DIM = 'reset_dim';
    case RESET_ITALIC = 'reset_italic';
    case RESET_UNDERLINE = 'reset_underline';
    case RESET_BLINK = 'reset_blink';
    case RESET_INVERSE = 'reset_inverse';
    case RESET_HIDDEN = 'reset_hidden';
    case RESET_STRIKETHROUGH = 'reset_strikethrough';
}