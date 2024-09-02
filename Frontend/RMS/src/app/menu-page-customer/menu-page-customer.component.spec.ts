import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MenuPageCustomerComponent } from './menu-page-customer.component';

describe('MenuPageCustomerComponent', () => {
  let component: MenuPageCustomerComponent;
  let fixture: ComponentFixture<MenuPageCustomerComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MenuPageCustomerComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MenuPageCustomerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
