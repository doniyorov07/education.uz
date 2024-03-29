/*************************************************************
 *
 *  Copyright (c) 2018 The MathJax Consortium
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

// @ts-ignore
import {CHTMLCharMap, AddCSS} from '../../FontData.js';
// @ts-ignore
import {italic as font} from '../../../common/fonts/tex/italic.js';

export const italic: CHTMLCharMap = AddCSS(font, {
    0x20: {c: ' '},
    0x21: {c: '!'},
    0x23: {c: '#'},
    0x25: {c: '%'},
    0x26: {c: '&'},
    0x28: {c: '('},
    0x29: {c: ')'},
    0x2A: {c: '*'},
    0x2B: {c: '+'},
    0x2C: {c: ','},
    0x2D: {c: '-'},
    0x2E: {c: '.'},
    0x2F: {c: '/'},
    0x30: {c: '0'},
    0x31: {c: '1'},
    0x32: {c: '2'},
    0x33: {c: '3'},
    0x34: {c: '4'},
    0x35: {c: '5'},
    0x36: {c: '6'},
    0x37: {c: '7'},
    0x38: {c: '8'},
    0x39: {c: '9'},
    0x3A: {c: ':'},
    0x3B: {c: ';'},
    0x3D: {c: '='},
    0x3F: {c: '?'},
    0x40: {c: '@'},
    0x41: {c: 'A'},
    0x42: {c: 'B'},
    0x43: {c: 'C'},
    0x44: {c: 'D'},
    0x45: {c: 'E'},
    0x46: {c: 'F'},
    0x47: {c: 'G'},
    0x48: {c: 'H'},
    0x49: {c: 'I'},
    0x4A: {c: 'J'},
    0x4B: {c: 'K'},
    0x4C: {c: 'L'},
    0x4D: {c: 'M'},
    0x4E: {c: 'N'},
    0x4F: {c: 'O'},
    0x50: {c: 'P'},
    0x51: {c: 'Q'},
    0x52: {c: 'R'},
    0x53: {c: 'S'},
    0x54: {c: 'T'},
    0x55: {c: 'U'},
    0x56: {c: 'V'},
    0x57: {c: 'W'},
    0x58: {c: 'X'},
    0x59: {c: 'Y'},
    0x5A: {c: 'Z'},
    0x5B: {c: '['},
    0x5D: {c: ']'},
    0x5E: {c: '^'},
    0x5F: {c: '_'},
    0x61: {c: 'a'},
    0x62: {c: 'b'},
    0x63: {c: 'c'},
    0x64: {c: 'd'},
    0x65: {c: 'e'},
    0x66: {c: 'f'},
    0x67: {c: 'g'},
    0x68: {c: 'h'},
    0x69: {c: 'i'},
    0x6A: {c: 'j'},
    0x6B: {c: 'k'},
    0x6C: {c: 'l'},
    0x6D: {c: 'm'},
    0x6E: {c: 'n'},
    0x6F: {c: 'o'},
    0x70: {c: 'p'},
    0x71: {c: 'q'},
    0x72: {c: 'r'},
    0x73: {c: 's'},
    0x74: {c: 't'},
    0x75: {c: 'u'},
    0x76: {c: 'v'},
    0x77: {c: 'w'},
    0x78: {c: 'x'},
    0x79: {c: 'y'},
    0x7A: {c: 'z'},
    0x7E: {c: '~'},
    0x391: {c: 'A'},
    0x392: {c: 'B'},
    0x395: {c: 'E'},
    0x396: {c: 'Z'},
    0x397: {c: 'H'},
    0x399: {c: 'I'},
    0x39A: {c: 'K'},
    0x39C: {c: 'M'},
    0x39D: {c: 'N'},
    0x39F: {c: 'O'},
    0x3A1: {c: 'P'},
    0x3A2: {c: '\\398'},
    0x3A4: {c: 'T'},
    0x3A7: {c: 'X'},
    0x3D2: {c: '\\3A5'},
    0x3DC: {c: 'F'},
    0x2015: {c: '\\2014'},
    0x2017: {c: '_'},
    0x2044: {c: '/'},
    0x210E: {c: 'h', f: 'I'},
    0x2206: {c: '\\394'},
    0x29F8: {c: '/', f: 'I'},
});
