"use strict"

let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0');
let yyyy = today.getFullYear();

document.addEventListener('DOMContentLoaded', () => {

    const mask = (dataValue, options) => {
      const elements = document.querySelectorAll(`[data-mask="${dataValue}"]`)
      if (!elements) return 
  
      elements.forEach(el => { 
        IMask(el, options) 
      })
    }
    mask('phone', {
      mask: '+{7}(000)000-00-00'
    })

    mask('date', {
      mask: Date,
      min: new Date(yyyy, mm, dd),
      max: new Date(yyyy+5, mm, dd)
    })
    const picker = datepicker(".js-input-time", {
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString()
            input.value = value.replace(/[\.\/]/g,'-');
          },
        startDay : 1,
        customDays : [ 'Пн' ,  'Вт' ,  'Ср' ,  'Чт' ,  'Пт' ,  'Сб' ,  'Вс' ],
        customMonths : [ 'Январь' ,  'Фвраль' ,  'Март' ,  'Апрель' ,  'Май' ,  'Июнь' ,  'Июль' ,  'Август' ,  'Сентябрь ' ,  'Октябрь' ,  'Ноябрь' ,  'Декабрь' ],
        maxDate: new Date(yyyy+5, mm, dd),
        overlayButton : "Продолжить",
        overlayPlaceholder: 'Введите год',
        minDate: new Date(yyyy, mm-1, dd),
        showAllDates : true
    });
})