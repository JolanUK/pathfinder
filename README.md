# Pathfinder

An application developed using the TALL stack (Tailwind, Alpine, Laravel, Livewire) using Filament.

---

## Architecture

### Users

User roles are borrowing a relationship structure that's similar to the Spatie Permissions package.

- Roles are cosmetic only, and only provide a label for admins
- Role Users are a tangible link between the source role and the user (the default Laravel model)
- Role Permissions will outline what the individual roles are able to do, and connect to policies/blade conditionals in the application