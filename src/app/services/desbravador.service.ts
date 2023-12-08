import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Desbravador } from '../models/desbravador';

@Injectable({
  providedIn: 'root'
})
export class DesbravadorService {
  private apiUrl = 'http://your-api-url.com';

  constructor(private http: HttpClient) { }

  getDesbravadores(): Observable<Desbravador[]> {
    return this.http.get<Desbravador[]>(`${this.apiUrl}/desbravadores`);
  }
}