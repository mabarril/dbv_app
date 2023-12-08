import { TestBed } from '@angular/core/testing';

import { DesbravadorService } from './desbravador.service';

describe('DesbravadorService', () => {
  let service: DesbravadorService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DesbravadorService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
