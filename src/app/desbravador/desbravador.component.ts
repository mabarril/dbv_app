import { Component, OnInit } from '@angular/core';
import { Desbravador } from '../models/desbravador';
import { DesbravadorService } from '../services/desbravador.service';

@Component({
  selector: 'app-desbravador',
  templateUrl: './desbravador.component.html',
  styleUrls: ['./desbravador.component.css']
})
export class DesbravadorComponent implements OnInit {
  desbravadores: Desbravador[] = [];

  constructor(private desbravadorService: DesbravadorService) { }
 
  ngOnInit(): void {
    this.getDesbravadores();
  }

  getDesbravadores() {
    this.desbravadorService.getDesbravadores().subscribe(desbravadores => this.desbravadores = desbravadores);
  }

  createDesbravador(desbravador: Desbravador) {
    this.desbravadores.push(desbravador);
  }

  readDesbravador(id: number) {
    return this.desbravadores.find(desbravador => desbravador.id === id);
  }

  updateDesbravador(id: number, nome: string, dataNascimento: Date) {
    const desbravador = this.readDesbravador(id);
    if (desbravador) {
      desbravador.nome = nome;
      desbravador.dataNascimento = dataNascimento;
    }
  }

  deleteDesbravador(id: number) {
    const index = this.desbravadores.findIndex(desbravador => desbravador.id === id);
    if (index !== -1) {
      this.desbravadores.splice(index, 1);
    }
  }
}