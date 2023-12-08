import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DesbravadorComponent } from './desbravador.component';

describe('DesbravadorComponent', () => {
  let component: DesbravadorComponent;
  let fixture: ComponentFixture<DesbravadorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [DesbravadorComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(DesbravadorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
