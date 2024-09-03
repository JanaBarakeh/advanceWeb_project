import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AddmenuitemPageComponent } from './addmenuitem-page.component';

/*@author Jana Barakeh*/
describe('AddmenuitemPageComponent', () => {
  let component: AddmenuitemPageComponent;
  let fixture: ComponentFixture<AddmenuitemPageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AddmenuitemPageComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AddmenuitemPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
