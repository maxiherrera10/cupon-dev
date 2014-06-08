$(document).ready(function() {
    $('#cuponForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'El nombre es requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'EL nombre debe ser menor a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'El nombre no existe'
                    }
                }
            },
            surname: {
                validators: {
                    notEmpty: {
                        message: 'El Apellido es requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'EL Apellido debe ser menor a 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'El nombre no existe'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El email es requerido'
                    },
                    emailAddress: {
                        message: 'El email no es valido'
                    }
                }
            },
            birthday: {
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The value is not a valid date'
                    },
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            // var m = new moment(value, 'MMMM D', true);
                            // // Check if the input value follows the MMMM D format
                            // if (!m.isValid()) {
                            //     return false;
                            // }
                            // // US independence day is July 4
                            // return (m.months() == 6 && m.date() == 4);

                            // var date = new Date(value);
                            // console.log(date);
                            // console.log("value");
                            // console.log(value);
                            // console.log("validator");
                            // console.log(validator);

                            return true;
                        }
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'La direccion es requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'La direccion debe ser menor a 30 caracteres'
                    }
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'La Ciudad es requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'La Ciudad debe ser menor a 30 caracteres'
                    }
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'El Pais es requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'El Pais debe ser menor a 30 caracteres'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'El Telefono es requerido'
                    },
                    phone: {
                        country: 'AR',
                        message: 'El Telefono debe ser de Argentina'
                    }
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'El Celular es requerido'
                    },
                    phone: {
                        country: 'AR',
                        message: 'El Celular debe ser de Argentina'
                    }
                }
            }
        }
    });
});