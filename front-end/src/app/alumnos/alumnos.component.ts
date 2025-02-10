import { Component, OnInit } from '@angular/core';
import { AlumnoService } from '../alumno.service';

@Component({
  selector: 'app-alumnos',
  templateUrl: './alumnos.component.html',
  styleUrls: ['./alumnos.component.css']
})
export class AlumnosComponent implements OnInit {
  nuevoAlumno = {
    nombre: '',
    fecha_nacimiento: '',
    nombre_padre: '',
    nombre_madre: '',
    grado: '',
    seccion: '',
    fecha_ingreso: ''
  };
  
  alumnos: any[] = [];
  gradoConsulta: string = '';

  constructor(private alumnoService: AlumnoService) { }

  ngOnInit(): void {
  }

  // Método para crear un alumno
  crearAlumno() {
    this.alumnoService.crearAlumno(this.nuevoAlumno).subscribe(
      response => {
        console.log('Alumno creado:', response);
        alert('Alumno creado');
        this.nuevoAlumno = { nombre: '', fecha_nacimiento: '', nombre_padre: '', nombre_madre: '', grado: '', seccion: '', fecha_ingreso: '' };
      },
      error => {
        console.error('Error no se pude crear alumno:', error);
        alert('Error no se pude crear alumno');
      }
    );
  }

  //  alumnos por grado
  consultarAlumnos() {
    this.alumnoService.consultarAlumno(this.gradoConsulta).subscribe(
      response => {
        this.alumnos = response;
        console.log('Cantidad de Alumnos :', this.alumnos);
      },
      error => {
        console.error('Error alumno no encontrados:', error);
        alert('Error alumno no encontrados');
      }
    );
  }
}
