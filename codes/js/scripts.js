/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts

window.addEventListener('DOMContentLoaded', event => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
});

// Initialize loading modal variable
var loadingModal = null;

/**
 * Toggles Loading Modal
*/
function toggleLoadingModal() {
    var modalHTML = '' +
        '<div class="modal modal-static" id="loading-modal" tabindex="-1">' +
            '<div class="modal-dialog modal-dialog-centered">' +
                '<div class="modal-content">' +
                    '<div class="modal-body text-center">' +
                        '<div class="loadingio-spinner-dual-ring-960vspktjv9">' +
                            '<div class="ldio-uui64yvt9bh">' +
                                '<div></div>' +
                                '<div>' +
                                    '<div></div>'+
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<p class="fs-4 fw-bold">Please wait...</p>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>';
    if (loadingModal == null) {
        document.body.insertAdjacentHTML("afterbegin", modalHTML);
        loadingModal = new bootstrap.Modal(document.getElementById('loading-modal'), {
            backdrop: 'static',
            keyboard: false
        });
        loadingModal.show();   
    } else {
        loadingModal.hide();
        loadingModal = null;
        document.getElementById('loading-modal').remove();
    }
}

/**
 * Validate Email Address
*/
function validateEmailAddress(inputEmail) {
    var emailRegexPattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    if (emailRegexPattern.test(inputEmail)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Current Date
 */
function currentDate(today = new Date()) {
    var year = today.getFullYear();
    var month = today.getMonth()+1; // January is 0
    if (month < 10) {
        month = "0"+month;
    }
    var day = today.getDate();
    if (day < 10) {
        day = "0"+day;
    }
    return year+"-"+month+"-"+day;
}

/**
 * Current Time
 */
function currentTime(today = new Date()) {
    var hours = today.getHours();
    if (hours < 10) {
        hours = "0"+hours;
    }
    var minutes = today.getMinutes();
    if (minutes < 10) {
        minutes = "0"+minutes;
    }
    return hours+":"+minutes;
}

/**
 * Current Date and Time
 */
function currentDateTime() {
    return currentDate()+" "+currentTime();
}

/**
 * Add Minutes to Current Date and Time
*/
function addMinutes(numOfMinutes, today = new Date()) {
    today.setMinutes(today.getMinutes()+1);
    return currentDate(today)+" "+currentTime(today);
}

/**
 * Shows a Toast Alert
 * Note: Requires a jQuery Library and a Toast Container Place inside HTML Element
*/
function showToastAlert(elementSelector, textMsg, bgColor) {
    var toastAlertHTML = '' +
        '<div class="toast show align-items-center text-white bg-'+bgColor+' border-0" role="alert" aria-live="assertive" aria-atomic="true">' +
            '<div class="d-flex">' +
                '<div class="toast-body">' +
                    textMsg +
                '</div>' +
                '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
            '</div>' +
        '</div>';
    $(elementSelector).prepend(toastAlertHTML);
    setTimeout(function () {
        $(elementSelector + " .toast:last-child").fadeOut(function() {
            $(this).remove();
        })
    }, 2000);
}