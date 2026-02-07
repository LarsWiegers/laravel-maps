# Changelog

All notable changes to `laravel-maps` will be documented in this file

## Unreleased

### Changed
- **[BREAKING]** Migrated from deprecated `google.maps.Marker` to `google.maps.marker.AdvancedMarkerElement` for Google Maps implementation
- Updated Google Maps API to use the marker library (v=weekly)
- Improved info window implementation to use modern API patterns

### Added
- Support for text labels next to markers using the `label` attribute
- Support for combining custom icons and labels on the same marker
- Better marker styling with flexbox layout for icon+label combinations

### Fixed
- Future-proofed Google Maps implementation against deprecation of legacy Marker class (deprecated as of February 21st, 2024)

## 1.0.0 - 201X-XX-XX

- initial release
