try {
    if(window.location.pathname == '/admin'){
        const ADD_MATERIA_FORM = document.getElementById('add_materia');
        const ADD_CARRERA_FORM = document.getElementById('add_carrera');
        const REMOVE_MATERIA_FORM = document.getElementById('remove_materia');
        const REMOVE_CARRERA_FORM = document.getElementById('remove_carrera');
        console.log(ADD_CARRERA_FORM)
        ADD_MATERIA_FORM.addEventListener('submit', async function(e){
            e.preventDefault();
            let data = new URLSearchParams(new FormData(this));
            data.append('type', 'add_materia');
            await fetch('./app/db.php',{
                method: 'post',
                body: data
            })
            alert('ACCION COMPLETADA!')
            window.location.href = '/materias'
        })
    
    
        ADD_CARRERA_FORM.addEventListener('submit', async function(e){
            e.preventDefault();
            let data = new URLSearchParams(new FormData(this));
            data.append('type', 'add_carrera');
            await fetch('./app/db.php',{
                method: 'post',
                body: data
            })
            .then(response => response.text())
            .then(text => console.log(text))
            alert('ACCION COMPLETADA!')
            window.location.href = '/carreras'
        })
    
        REMOVE_MATERIA_FORM.addEventListener('submit', async function(e){
            e.preventDefault();
            let data = new URLSearchParams(new FormData(this));
            data.append('type', 'remove_materia');
            await fetch('./app/db.php',{
                method: 'post',
                body: data
            })
            alert('ACCION COMPLETADA!')
            window.location.href = '/materias'
        })
    
        REMOVE_CARRERA_FORM.addEventListener('submit', async function(e){
            e.preventDefault();
            let data = new URLSearchParams(new FormData(this));
            data.append('type', 'remove_carrera');
            await fetch('./app/db.php',{
                method: 'post',
                body: data
            })
            alert('ACCION COMPLETADA!')
            window.location.href = '/carreras'
        })
    
    }
} catch (error) {
    throw (error)
}

