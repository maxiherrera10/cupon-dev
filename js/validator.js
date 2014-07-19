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
                    notEmpty: {
                        message: 'El Cumpleanio es requerido'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'La fecha debe ser valida'
                    },
                    callback: {
                        message: 'Debe ser mayor a 18 años',
                        callback: function(value, validator) {
                            var m = new moment(value, 'DD/MM/YYYY', true);
                            if (!m.isValid()) {
                                return false;
                            }
                            // Check if the date in our range
                            var strings = [];
                            if (m != null) {
                                strings = m.fromNow().split(" ",1);
                            }
                            
                            var age = parseInt(strings[0]);
                            return age > 17;
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
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'El telefono debe ser menor a 30 caracteres'
                    },
                    integer: {
                        message: 'Debe ser un numero'
                    }
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'El Celular es requerido'
                    },
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'El Celular debe ser menor a 30 caracteres'
                    },
                    integer: {
                        message: 'Debe ser un numero'
                    }
                }
            }
        }
    });
});