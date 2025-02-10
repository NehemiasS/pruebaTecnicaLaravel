import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AlumnoService {
  
  private apiUrl = 'http://localhost:80'; 
  constructor(private http: HttpClient) { }

    // Método para crear un alumno
    crearAlumno(alumno: any): Observable<any> {
      const headers = new HttpHeaders().set('Authorization', 'Basic YWRtaW46c2VjcmV0'); // Reemplaza con las credenciales Base64
      return this.http.post(`${this.apiUrl}/crear-alumno`, alumno, { headers });
    }
  
    // Método para consultar alumnos por grado
    consultarAlumno(grado: string): Observable<any> {
      const headers = new HttpHeaders().set('Authorization', 'Basic YWRtaW46c2VjcmV0'); // Reemplaza con las credenciales Base64
      return this.http.get(`${this.apiUrl}/consultar-alumno/${grado}`, { headers });
    }
}
