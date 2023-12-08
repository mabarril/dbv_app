import { Component } from '@angular/core';
import { Desbravador } from '../models/desbravador';

@Component({
  selector: 'app-desbravador',
  templateUrl: './desbravador.component.html',
  styleUrls: ['./desbravador.component.css']
})
export class DesbravadorComponent {
  desbravadores: Desbravador[] = [];

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