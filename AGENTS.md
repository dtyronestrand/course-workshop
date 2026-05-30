# AGENTS

## Purpose
This repository is a Laravel 13 + Inertia + Vue 3 + TypeScript course workshop app with team-scoped routes and Fortify auth.

Use this file as the default operating guide. Keep changes small, typed, and convention-aligned.

## Source Of Truth
- Project scripts and PHP tooling: [composer.json](composer.json)
- Frontend scripts and dependencies: [package.json](package.json)
- ESLint rules and ignored generated paths: [eslint.config.js](eslint.config.js)
- PHP formatting rules: [pint.json](pint.json)
- Test setup (sqlite in-memory): [phpunit.xml](phpunit.xml)
- Inertia SSR and page discovery: [config/inertia.php](config/inertia.php)
- Frontend app bootstrap and layout routing: [resources/js/app.ts](resources/js/app.ts)
- Main web routes: [routes/web.php](routes/web.php)
- CI test matrix: [.github/workflows/tests.yml](.github/workflows/tests.yml)
- CI lint flow: [.github/workflows/lint.yml](.github/workflows/lint.yml)

## Daily Commands
- Install and bootstrap: `composer run setup`
- Full local dev stack: `composer run dev`
- Frontend dev only: `npm run dev`
- PHP lint fix: `composer run lint`
- Lint checks only: `composer run lint:check`
- Frontend lint fix: `npm run lint`
- Frontend format fix: `npm run format`
- Frontend type checks: `npm run types:check`
- Full checks used by project test script: `composer run test`
- PHPUnit only: `./vendor/bin/phpunit`

## Architecture Map
- Backend domain and framework code: [app](app)
- HTTP controllers/middleware/requests: [app/Http](app/Http)
- Eloquent models: [app/Models](app/Models)
- Domain enums and authorization helpers: [app/Enums](app/Enums), [app/Support](app/Support)
- Custom validation rules and traits: [app/Rules](app/Rules), [app/Concerns](app/Concerns)
- Frontend pages/components/layouts/types: [resources/js](resources/js)
- Routes: [routes](routes)
- Migrations/factories/seeders: [database](database)
- Tests: [tests](tests)

## Project Conventions
- Prefer Form Request classes for validation instead of inline validation in controllers.
- Prefer enum-driven permission checks from [app/Enums](app/Enums) over string role/permission checks.
- Keep team-scoped behavior aligned with route/middleware patterns in [routes/web.php](routes/web.php).
- Use strict TypeScript in Vue SFCs (`<script setup lang="ts">`) and keep props/types explicit.
- Preserve Inertia layout routing conventions defined in [resources/js/app.ts](resources/js/app.ts).
- Follow existing code style tools rather than manual formatting.

## Generated Or Managed Paths
Do not hand-edit generated or managed frontend files covered by lint ignores unless explicitly required:
- [resources/js/actions](resources/js/actions)
- [resources/js/routes](resources/js/routes)
- [resources/js/wayfinder](resources/js/wayfinder)
- [resources/js/components/ui](resources/js/components/ui)

## Change Checklist For Agents
1. Make the smallest viable change in the most local module.
2. Run targeted checks first, then broader checks if needed.
3. If backend behavior changed, run `composer run test` (or the narrowest relevant test scope).
4. If frontend behavior changed, run `npm run lint:check` and `npm run types:check`.
5. Do not revert unrelated user changes in a dirty working tree.

## High-Risk Areas
- Team membership/permission behavior across middleware, policies, and enums.
- Migrations and model relationship changes that can affect existing data flow.
- Inertia shared props and layout resolution affecting multiple pages.

## PR-Ready Output Expectations
When finishing work, include:
- What changed and why.
- Which commands were run to validate.
- Any follow-up risk or unverified edge case.
