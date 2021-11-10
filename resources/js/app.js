require('./bootstrap');

require('alpinejs');

import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';
import localeEn from 'air-datepicker/locale/en';

window.DatePicker = AirDatepicker;
window.DatePickerlocaleEn = localeEn;
