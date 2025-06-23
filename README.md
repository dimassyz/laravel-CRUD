NAMA KELOMPOK:
- Dimas Setiawan
- M. Araka Ridwan Akbar
- Rimbhiatho Aurindra

ROUTE:

### CRUD Synchronous
(Prefix: /pasien-sync)

- GET    /pasien-sync             → pasien.index
- GET    /pasien-sync/create      → pasien.create
- POST   /pasien-sync/store       → pasien.store
- GET    /pasien-sync/edit/{id}   → pasien.edit
- PUT    /pasien-sync/update/{id} → pasien.update
- DELETE /pasien-sync/delete/{id} → pasien.destroy

### CRUD Asynchronous (AJAX)
(Prefix: /pasien-async)

- GET    /pasien-async             → pasien.ajax.index
- GET    /pasien-async/data        → pasien.ajax.data
- POST   /pasien-async/store       → pasien.ajax.store
- GET    /pasien-async/edit/{id}   → pasien.ajax.edit
- PUT    /pasien-async/update/{id} → pasien.ajax.update
- DELETE /pasien-async/delete/{id} → pasien.ajax.destroy
