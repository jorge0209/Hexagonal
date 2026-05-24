function confirmDelete()
{
    return confirm(
        '¿Seguro que deseas eliminar este usuario?'
    );
}

document.addEventListener(
    'DOMContentLoaded',
    () => {

        const forms =
            document.querySelectorAll('form');

        forms.forEach(form => {

            form.addEventListener(
                'submit',
                e => {

                    const inputs =
                        form.querySelectorAll('input[required]');

                    let valid = true;

                    inputs.forEach(input => {

                        if (
                            input.value.trim() === ''
                        ) {

                            valid = false;

                            input.style.border =
                            '2px solid red';
                        }
                    });

                    if (!valid) {

                        e.preventDefault();

                        alert(
                            'Completa todos los campos'
                        );
                    }
                }
            );
        });
    }
);